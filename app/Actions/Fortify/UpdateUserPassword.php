<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Sanctum\PersonalAccessToken;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

        DB::transaction(function () use ($user, $input): void {
            $user->forceFill([
                'password' => Hash::make($input['password']),
                'remember_token' => Str::random(60),
            ])->save();

            $currentToken = $user->currentAccessToken();
            if (! $currentToken instanceof PersonalAccessToken && ($bearerToken = request()?->bearerToken())) {
                $candidate = PersonalAccessToken::findToken($bearerToken);
                if (
                    $candidate instanceof PersonalAccessToken &&
                    (int) $candidate->tokenable_id === (int) $user->id &&
                    $candidate->tokenable_type === $user->getMorphClass()
                ) {
                    $currentToken = $candidate;
                }
            }

            $user->tokens()
                ->when(
                    $currentToken instanceof PersonalAccessToken,
                    fn ($query) => $query->where('id', '!=', $currentToken->id)
                )
                ->delete();
        });
    }
}
