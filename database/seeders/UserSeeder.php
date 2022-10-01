<?php

namespace Database\Seeders;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserSeeder extends Seeder
{

    public function generatePassword($length = 8)
    {
        // function that generate password like : picture-post-[random_int]-phone-wood
        // use an API to generate a random word
        $words = json_decode(file_get_contents('https://random-word-api.herokuapp.com/word?number=5'));
        $password = '';
        foreach ($words as $word) {
            $password .= $word . '-';
        }
        $password .= rand(100, 999);
        return $password;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Users 16 : 
         * 
            * 	Benazzouz	Zakaria	Zakaria.Benazzouz@etu.univ-grenoble-alpes.fr
            *   Chevalier	Marc	Marc.Chevalier@etu.univ-grenoble-alpes.fr
            *   De Barros	Mathias	Mathias.De-Barros@etu.univ-grenoble-alpes.fr
            *   Duka	Alen	Alen.Duka@etu.univ-grenoble-alpes.fr
            *   Erard	Quentin	Quentin.Erard@etu.univ-grenoble-alpes.fr
            
            *   Gandon	Cameron	Cameron.Gandon@etu.univ-grenoble-alpes.fr
            *   Mathiot	Noemie	Noemie.Mathiot@etu.univ-grenoble-alpes.fr
            *   Messier	Alexis	Alexis.Messier1@etu.univ-grenoble-alpes.fr
            *   Moreira	Luca	Luca.Moreira@etu.univ-grenoble-alpes.fr
            *   Musuasua	Jose Moris	Jose-Moris.Musuasua@etu.univ-grenoble-alpes.fr
            
            *   Ripert	Gabriel	Gabriel.Ripert@etu.univ-grenoble-alpes.fr
            *   Ruas	Sebastien	Sebastien.Ruas@etu.univ-grenoble-alpes.fr
            *   Sabin	Evan	Evan.Sabin@etu.univ-grenoble-alpes.fr
            *   Sauvage	Bastien	Bastien.Sauvage1@etu.univ-grenoble-alpes.fr
            *   Sellam	Rayane	Rayane.Sellam@etu.univ-grenoble-alpes.fr
            
            *   Zeyeni-Languaroudi	Stephane	Stephane.Zeyeni-Languaroudi@etu.univ-grenoble-alpes.fr
            * Boscardin Alexandre 
            * Boutahar Elyas 
            * Brignone Theo
            * Carlino Romain
            * Decorme Nathan
            * Fruteau Alexandre
            * Himeur Mouloud
            * Kalmani Chayma
            * Landeau Louis
            * Lenoir Sofia
            * Perbet Anthony
            * Zerbib-Wronka Eva
         */
        $users = [
            [
                'firstname' => 'Zakaria',
                'lastname' => 'Benazzouz',
                'role' => 'student',
            ],
            [
                'firstname' => 'Marc',
                'lastname' => 'Chevalier',
                'role' => 'student',
            ],
            // [
            //     'firstname' => 'Mathias',
            //     'lastname' => 'De Barros',
            //     'role' => 'admin',
            // ],
            [
                'firstname' => 'Alen',
                'lastname' => 'Duka',
                'role' => 'student',
            ],
            [
                'firstname' => 'Quentin',
                'lastname' => 'Erard',
                'role' => 'student',
            ],
            [
                'firstname' => 'Cameron',
                'lastname' => 'Gandon',
                'role' => 'student',
            ],
            [
                'firstname' => 'Noemie',
                'lastname' => 'Mathiot',
                'role' => 'student',
            ],
            [
                'firstname' => 'Alexis',
                'lastname' => 'Messier',
                'role' => 'student',
            ],
            [
                'firstname' => 'Luca',
                'lastname' => 'Moreira',
                'role' => 'student',
            ],
            [
                'firstname' => 'Jose Moris',
                'lastname' => 'Musuasua',
                'role' => 'student',
            ],
            [
                'firstname' => 'Gabriel',
                'lastname' => 'Ripert',
                'role' => 'student',
            ],
            [
                'firstname' => 'Sebastien',
                'lastname' => 'Ruas',
                'role' => 'student',
            ],
            [
                'firstname' => 'Evan',
                'lastname' => 'Sabin',
                'role' => 'student',
            ],
            [
                'firstname' => 'Bastien',
                'lastname' => 'Sauvage',
                'role' => 'student',
            ],
            [
                'firstname' => 'Rayane',
                'lastname' => 'Sellam',
                'role' => 'student',
            ],
            [
                'firstname' => 'Stephane',
                'lastname' => 'Zeyeni-Languaroudi',
                'role' => 'student',
            ],
            [
                'firstname' => 'Alexandre',
                'lastname' => 'Boscardin',
                'role' => 'student',
            ],
            [
                'firstname' => 'Elyas',
                'lastname' => 'Boutahar',
                'role' => 'student',
            ],
            [
                'firstname' => 'Theo',
                'lastname' => 'Brignone',
                'role' => 'student',
            ],
            [
                'firstname' => 'Romain',
                'lastname' => 'Carlino',
                'role' => 'student',
            ],
            [
                'firstname' => 'Nathan',
                'lastname' => 'Decorme',
                'role' => 'student',
            ],
            [
                'firstname' => 'Alexandre',
                'lastname' => 'Fruteau',
                'role' => 'student',
            ],
            [
                'firstname' => 'Mouloud',
                'lastname' => 'Himeur',
                'role' => 'student',
            ],
            [
                'firstname' => 'Chayma',
                'lastname' => 'Kalmani',
                'role' => 'student',
            ],
            [
                'firstname' => 'Louis',
                'lastname' => 'Landeau',
                'role' => 'student',
            ],
            [
                'firstname' => 'Sofia',
                'lastname' => 'Lenoir',
                'role' => 'student',
            ],
            [
                'firstname' => 'Anthony',
                'lastname' => 'Perbet',
                'role' => 'student',
            ],
            [
                'firstname' => 'Eva',
                'lastname' => 'Zerbib-Wronka',
                'role' => 'student',
            ],
        ];

        foreach ($users as $user) {
            // email is firstname.lastname@etu.univ-grenoble-alpes.fr
            // set - to space in lastname
            $user['email'] = strtolower(str_replace(' ', '-', $user['firstname']) . '.' . str_replace(' ', '-', $user['lastname']) . '@etu.univ-grenoble-alpes.fr');
            $user['login'] = strtolower(str_replace(['-', ' '],['', ''],trim($user['lastname']))) . '_' . strtolower(substr($user['firstname'], 0, 1));
            $user['password'] = $this->generatePassword();

            // send email
            Mail::to($user['email'])->send(new WelcomeMail($user));

            // remove role from user
            $role = $user['role'];
            unset($user['role']);

            // create user
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
