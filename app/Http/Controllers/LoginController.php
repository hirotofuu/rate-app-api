<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt($request->all())){
            return Auth::user()->api_token;
        }
        throw ValidationException::withMessages([
            'loginFailed' =>['IDまたはパスワードが間違っています。']
        ]);

    }
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token'=>Hash::make(Str::random(60)),
        ]);

        }



    }

