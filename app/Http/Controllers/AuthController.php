<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //// Muestra la vista del formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register()
    {
        return redirect('/eventos');
    }
}
