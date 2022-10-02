<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class PageController extends Controller
{
    
    public function settings() 
    {
        return view('pages.settings.index');
    }

    public function updateSettings(Request $request) 
    {
        $settings['email']['type'] = $request->email_type;
        $settings['email']['host'] = $request->email_host;
        $settings['email']['port'] = $request->email_port;
        $settings['email']['username'] = $request->email_username;
        $settings['email']['password'] = $request->email_password;
        $settings['email']['encryption'] = $request->email_encryption;
        
        Artisan::call('dotenv:set-key', [
            'key' => 'MAIL_MAILER',
            'value' => $settings['email']['type']
        ]);
        Artisan::call('dotenv:set-key', [
            'key' => 'MAIL_HOST',
            'value' => $settings['email']['host']
        ]);
        Artisan::call('dotenv:set-key', [
            'key' => 'MAIL_PORT',
            'value' => $settings['email']['port']
        ]);
        Artisan::call('dotenv:set-key', [
            'key' => 'MAIL_USERNAME',
            'value' => $settings['email']['username']
        ]);
        Artisan::call('dotenv:set-key', [
            'key' => 'MAIL_PASSWORD',
            'value' => $settings['email']['password']
        ]);
        Artisan::call('dotenv:set-key', [
            'key' => 'MAIL_ENCRYPTION',
            'value' => $settings['email']['encryption']
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
