<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
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

        $generatedName = ! empty($input['name'])
            ? (string) $input['name']
            : 'user_'.random_int(100000, 999999);

        return User::create([
            'name' => $generatedName,
            'email' => $input['email'],
            'phone' => $input['phone'] ?? null,
            'birth_date' => $input['birth_date'] ?? null,
            'birth_place' => $input['birth_place'] ?? null,
            'password' => Hash::make($input['password']),
        ]);
    }
}
