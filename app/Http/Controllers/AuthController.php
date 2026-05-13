<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
    // 1. Validar campos
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);


    // 2. Intentar login

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $user = Auth::user();

        // Verificar si es admin por dominio
        $isAdmin = str_ends_with(
            $user->email,
            '@uadyspot.mx'
        );

        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        Session::put('user_email', $user->email);
        Session::put('is_admin', $isAdmin);

        if ($isAdmin) {

            return redirect()
                ->route('admin.dashboard');

        }

        return redirect()
            ->route('inicio');

    }


    return back()->withErrors([
        'email' => 'Credenciales incorrectas'
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
        ///// Manejo de foto de perfil
        if (
            $request->hasFile('profile_photo') &&
            $request->file('profile_photo')->isValid()
        ) {

            $file = $request->file('profile_photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $destination = public_path('uploads/avatars');

            // Crear carpeta si no existe
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $file->move($destination, $filename);

            $user->profile_photo = 'uploads/avatars/' . $filename;
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
