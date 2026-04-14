<?php

namespace App\Http\Controllers;
use App\Models\Comentario;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    public function store(Request $request)
        {

            $request->validate([

            'nombre' => 'required',

            'email' => 'required|email',

            'comentario' => 'required|min:5'

            ]);

            Comentario::create($request->all());

            return back()
            ->with('success',
            'Comentario enviado correctamente');

        }

}