<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     *
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        $normalizedInput = [
            ...$input,
            'name' => is_string($input['name'] ?? null) ? trim($input['name']) : ($input['name'] ?? ''),
            'email' => Str::lower(trim((string) ($input['email'] ?? ''))),
        ];

        foreach (['phone', 'birth_date', 'birth_place'] as $optionalField) {
            if (array_key_exists($optionalField, $normalizedInput) && is_string($normalizedInput[$optionalField])) {
                $trimmed = trim($normalizedInput[$optionalField]);
                $normalizedInput[$optionalField] = $trimmed !== '' ? $trimmed : null;
            }
        }

        Validator::make($normalizedInput, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => ['nullable', 'string', 'phone:AUTO,CI,CM,FR,US,CA,BE,CH,SN,ML,GA,CG,CD,MA,DZ,TN,GB,DE,IT,ES,NG,GH,KE,ZA,TG,BJ,BF,GN,MG'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'birth_place' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        if ($normalizedInput['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $normalizedInput);
        } else {
            $user->forceFill([
                'name' => $normalizedInput['name'],
                'email' => $normalizedInput['email'],
                'phone' => array_key_exists('phone', $normalizedInput) ? $normalizedInput['phone'] : $user->phone,
                'birth_date' => array_key_exists('birth_date', $normalizedInput) ? $normalizedInput['birth_date'] : $user->birth_date,
                'birth_place' => array_key_exists('birth_place', $normalizedInput) ? $normalizedInput['birth_place'] : $user->birth_place,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => array_key_exists('phone', $input) ? $input['phone'] : $user->phone,
            'birth_date' => array_key_exists('birth_date', $input) ? $input['birth_date'] : $user->birth_date,
            'birth_place' => array_key_exists('birth_place', $input) ? $input['birth_place'] : $user->birth_place,
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
