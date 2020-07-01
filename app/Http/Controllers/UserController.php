<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function store(Request $request)
    {

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'rol' => $request['rol'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()->with('msg', 'Usuario creado con exito');
    }
}
