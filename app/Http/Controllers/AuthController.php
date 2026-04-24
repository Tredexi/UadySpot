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
        // 1. Validamos todo (incluyendo el captcha)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ], [
            'captcha.captcha' => 'El código de verificación es incorrecto.',
        ]);

        // 2. IMPORTANTE: Solo tomamos email y password para el intento de login
        // Esto evita el error de "Unknown column 'captcha'"
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // 3. NUEVA LÓGICA DE ADMIN: Verificar por dominio de correo
            // Si el correo termina en @uadyspot.mx, es admin
            $isAdmin = str_ends_with($user->email, '@uadyspot.mx');

            // Guardar variables de sesión
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('user_email', $user->email);
            Session::put('is_admin', $isAdmin); // Guardamos el resultado del check de correo

            // Redirección según el dominio del correo
            if ($isAdmin) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('inicio');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }
        public function perfil()
    {
        return view('auth.profile');
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('avatars', 'public');
            $user->profile_photo = $path; // Asegúrate de tener esta columna en tu DB
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
