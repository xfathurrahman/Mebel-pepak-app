<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:20','unique:users'],
            'name' => ['required','string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:11','max:13'],
            'address' => ['required','string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'username' => $input['username'],
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
