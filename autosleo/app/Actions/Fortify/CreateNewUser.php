<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'dateB' => ['required'],
            'municipalityid' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'telephone' => ['required'],
            'cellphone' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'date_of_birth' => $input['dateB'],
            'municipalityid' => $input['municipalityid'],
            'address' => $input['address'],
            'telephone' => $input['telephone'],
            'cellphone' => $input['cellphone'],
            'gender' => $input['gender'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ])->assignRole('Usuario');
    }
}
