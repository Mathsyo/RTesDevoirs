<?php

namespace Database\Seeders;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class UserSeeder extends Seeder
{

    public function generatePassword($length = 8)
    {
        $words = json_decode(file_get_contents('https://random-word-api.herokuapp.com/word?number=' . $length));
        $password = '';
        foreach ($words as $word) {
            $password .= $word . '-';
        }
        $password .= rand(100, 999);
        return $password;
    }

    public function run()
    {
        $users = config('students.students');

        foreach ($users as $user) {
            $user['email'] = strtolower(str_replace(' ', '-', $user['firstname']) . '.' . str_replace(' ', '-', $user['lastname']) . '@etu.univ-grenoble-alpes.fr');
            $user['login'] = strtolower(str_replace(['-', ' '],['', ''],trim($user['lastname']))) . '_' . strtolower(substr($user['firstname'], 0, 1));
            $user['password'] = $this->generatePassword();

            Mail::to($user['email'])->send(new WelcomeMail($user));

            $role = $user['role'];
            unset($user['role']);

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
