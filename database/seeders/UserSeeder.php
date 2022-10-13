<?php

namespace Database\Seeders;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class UserSeeder extends Seeder
{

    public function run()
    {
        $usersAndRoles = config('school.users');

        foreach ($usersAndRoles as $role => $users) {
            foreach($users as $user){

                $user['email'] = strtolower(str_replace(' ', '-', $user['firstname']) . '.' . str_replace(' ', '-', $user['lastname']) . '@etu.univ-grenoble-alpes.fr');
                $user['login'] = strtolower(str_replace(['-', ' '],['', ''],trim($user['lastname']))) . '_' . strtolower(substr($user['firstname'], 0, 1));
                $user['password'] = User::generatePassword();

                if (config('mail.mailers.smtp.host') != 'smtp.mailtrap.io') {
                    Mail::to($user['email'])->send(new WelcomeMail($user));
                }

                $user = User::create([
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'login' => $user['login'],
                    'password' => bcrypt($user['password']),
                    'email' => $user['email'],
                ]);
                $user->assignRole($role);
            }
        }
    }
}
