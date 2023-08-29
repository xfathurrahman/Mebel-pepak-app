<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    public function update($user, array $input)
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:25', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', Rule::unique('users')->ignore($user->id)],
            'phone_number' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:11','max:13'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'username' => $input['username'],
                'name' => $input['name'],
                'email' => $input['email'],
                'gender_id' => $input['gender_id'],
                'birth_date' => $input['birth_date'],
                'phone_number' => $input['phone_number'],
                'address' => $input ['address'],
            ])->save();
        }
    }

    protected function updateVerifiedUser($user, array $input): void
    {
        $user->forceFill([
            'username' => $input['username'],
            'name' => $input['name'],
            'email' => $input['email'],
            'gender_id' => $input['gender_id'],
            'birth_date' => $input['birth_date'],
            'phone_number' => $input['phone_number'],
            'address' => $input ['address'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
