<?php

namespace App\Actions\Fortify;

use App\Models\gusto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms2' => [],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? [ 'accepted'] : '',
        ])->validate();

        $user=    User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $gustos = [];
        foreach ($input['terms2'] as $key => $value) {
            array_push($gustos,['name_gustos'=>$value]);
        }
        DB::table('gustos')->insert($gustos);
        DB::table('gustos')->insert($user->id);
        return $user;
    }
}
