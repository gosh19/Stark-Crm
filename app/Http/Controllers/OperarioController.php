<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperarioController extends Controller
{
    public function index()
    {

        return view('operario.index',['user' => Auth::user()]);
    }
}
