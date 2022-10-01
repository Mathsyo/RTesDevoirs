<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->info('Make sure to have run the migrations and the seeders before running this command');

        /** ask inputs from ['lastname','firstname','login', 'email', 'password']; */

        $firstname = $this->ask('What is your firstname?');
        $lastname = $this->ask('What is your lastname?');
        $password = $this->secret('What is your password?');

        /** create user */
        $user = User::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'login' => strtolower(str_replace(['-', ' '],['', ''],trim($lastname))) . '_' . strtolower(substr($firstname, 0, 1)),
            'email' => $firstname.'.'.str_replace(' ', '-', $lastname).'@etu.grenoble-alpes.fr',
            'password' => bcrypt($password),
        ]);
        $user->assignRole('admin');

    }
}
