<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $operarios = \App\Operario::getAll();

        return view('admin.index', ['operarios' => $operarios]);
    }

}
