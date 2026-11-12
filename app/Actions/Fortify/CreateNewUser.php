<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, mixed>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        $normalizedInput = [
            ...$input,
            'email' => Str::lower(trim((string) ($input['email'] ?? ''))),
        ];

        foreach (['name', 'phone', 'birth_place'] as $optionalField) {
            if (array_key_exists($optionalField, $normalizedInput) && is_string($normalizedInput[$optionalField])) {
                $trimmed = trim($normalizedInput[$optionalField]);
                $normalizedInput[$optionalField] = $trimmed !== '' ? $trimmed : null;
            }
        }

        Validator::make($normalizedInput, [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['nullable', 'string', 'phone:AUTO,CI,CM,FR,US,CA,BE,CH,SN,ML,GA,CG,CD,MA,DZ,TN,GB,DE,IT,ES,NG,GH,KE,ZA,TG,BJ,BF,GN,MG'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        $generatedName = ! empty($normalizedInput['name'])
            ? (string) $normalizedInput['name']
            : 'user_'.random_int(100000, 999999);

        return User::create([
            'name' => $generatedName,
            'email' => $normalizedInput['email'],
            'phone' => $normalizedInput['phone'] ?? null,
            'birth_date' => $normalizedInput['birth_date'] ?? null,
            'birth_place' => $normalizedInput['birth_place'] ?? null,
            'password' => Hash::make((string) $normalizedInput['password']),
        ]);
    }
}
