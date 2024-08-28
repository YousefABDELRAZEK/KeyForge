<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function show(){
        return view('password');
    }
    public function generate(Request $request)
    {
        $length = $request->input('length', 12);
        $upper = $request->input('upper', false);
        $lower = $request->input('lower', false);
        $numbers = $request->input('numbers', false);
        $symbols = $request->input('symbols', false);
    
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $symbolset = '!@#$%^&*()-_=+[]{}|;:,.<>?';
        $numberset = '1234567890';
    
        $charpool = '';
    
        if ($upper) {
            $charpool .= $uppercase;
        }
        if ($lower) {
            $charpool .= $lowercase;
        }
        if ($numbers) {
            $charpool .= $numberset;
        }
        if ($symbols) {
            $charpool .= $symbolset;
        }
    
       //generate the password
      
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $charpool[random_int(0, strlen($charpool) - 1)];
        }
    
        return view('password', compact('password'));
    }
}    