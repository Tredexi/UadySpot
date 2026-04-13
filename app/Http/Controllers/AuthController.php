<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    

    public function register(Request $request)
    {

    $request->validate([

        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'email',
            'unique:users,email',

            // Solo correos UADY
            'regex:/^[a-zA-Z0-9._%+-]+@(alumnos\.uady\.mx|correo\.uady\.mx)$/'
        ],

        'password' => 'required|min:8|confirmed',

    ], [

        'email.regex' =>
        'Solo se permiten correos institucionales UADY (@alumnos.uady.mx o @correo.uady.mx)',

    ]);



    User::create([

        'name' => $request->name,

        'email' => $request->email,

        'password' => Hash::make($request->password),

        'is_admin' => false,

    ]);



    return redirect()
            ->route('login')
            ->with('success',
            'Cuenta creada correctamente. Ahora inicia sesión.');

    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {

        $credentials = $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // Guardar variables de sesión
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('user_email', $user->email);
            Session::put('is_admin', $user->is_admin);

            // Redirección según tipo
            if ($user->is_admin) {

                return redirect()->route('admin.dashboard');

            }

            return redirect()->route('inicio');

        }

        return back()->withErrors([

            'email' => 'Credenciales incorrectas',

        ]);

    }
    
}
