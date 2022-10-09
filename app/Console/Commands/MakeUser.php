<?php

namespace App\Console\Commands;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

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

        $this->info('Make sure to have run the permissions migrations and seeders before running this command');

        // Get the user's firstname and lastname
        $user['firstname'] = $this->ask('What is your firstname?');
        $user['lastname'] = $this->ask('What is your lastname?');

        // Get the user's email
        if($this->confirm('Set a custom login')){
            $user['login'] = $this->ask('What is your login?');
        } else {
            $user['login'] = strtolower(str_replace(['-', ' '],['', ''],trim($user['lastname']))) . '_' . strtolower(substr($user['firstname'], 0, 1));
        }

        // Check if the user already exists
        $checkUser = User::where('login', $user['login'])->first();
        if($checkUser){
            $this->error('User with login '.$user['login'].' already exists');
            if($this->confirm('Remove this user ?', true)) {
                $checkUser->delete();
            }else{
                return 0;
            }
        }

        // Choose role for the user
        $roles = ['admin', 'student'];
        $role = $this->choice('What is your role?', $roles, 0);

        // Get the user's email
        if($this->confirm('Set a custom email ?')) {
            $user['email'] = $this->ask('What is your email?');
        } else {
            $user['email'] = strtolower(str_replace(' ', '-', $user['firstname']) . '.' . str_replace(' ', '-', $user['lastname']) . '@etu.univ-grenoble-alpes.fr');
        }

        // Get the user's password
        if($this->confirm('Do you want to generate a random password?', true)){
            $user['password'] = User::generatePassword();
        }else{
            $user['password'] = $this->secret('What is your password?');
        }

        if($this->confirm('Send welcome email ?', true)) {
            $user['password'] = User::generatePassword();
            Mail::to($user['email'])->send(new WelcomeMail($user));
        } else {
            $user['password'] = $this->secret('What is your password?');
        }

        // Display the user's data
        $this->info('Admin credentials:');
        $this->info('+ Login: '.$user['login']);
        $this->info('+ Password: '.$user['password']);

        // Encrypt the password
        $user['password'] = bcrypt($user['password']);

        // Create the user
        $user = User::create($user);
        $user->assignRole($role);

    }
}
