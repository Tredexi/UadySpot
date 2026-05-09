<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CartController extends Controller
{

    // MOSTRAR CARRITO
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        // Calcular total
        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];

        }

        return view('cart.index', compact('cart', 'total'));
    }


    // AGREGAR AL CARRITO
    public function add(Request $request, $id)
    {

        // Buscar evento
        $event = Evento::find($id);

        // Si no existe
        if (!$event) {

            return back()->with(
                'error',
                'Evento no encontrado'
            );

        }

        // Obtener carrito actual
        $cart = session()->get('cart', []);

        // Si ya existe en carrito
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            // Agregar nuevo
            $cart[$id] = [

                "title" => $event->titulo,

                "quantity" => 1,

                "price" => $event->precio,

                "image" => $event->imagen

            ];

        }

        // Guardar carrito
        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Evento añadido al carrito'
            );
    }


    // ELIMINAR DEL CARRITO
    public function remove($id)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);

        }

        return back()->with(
            'success',
            'Eliminado correctamente'
        );
    }

    public function payment()
{

    $cart = session()->get('cart', []);

    // Si el carrito está vacío
    if (empty($cart)) {

        return redirect()
            ->route('cart.index')
            ->with(
                'error',
                'Tu carrito está vacío.'
            );

    }

    // Calcular total
    $total = 0;

    foreach ($cart as $item) {

        $total +=
            $item['price'] *
            $item['quantity'];

    }

    return view(
        'cart.payment',
        compact('cart', 'total')
    );

}

// AUMENTAR CANTIDAD
public function increase($id)
{

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        // LÍMITE DE 5
        if ($cart[$id]['quantity'] < 5) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

        } else {

            return back()->with(
                'error',
                'Solo puedes comprar máximo 5 boletos por evento.'
            );

        }

    }

    return back();

}


// DISMINUIR CANTIDAD
public function decrease($id)
{

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        // mínimo 1
        if ($cart[$id]['quantity'] > 1) {

            $cart[$id]['quantity']--;

            session()->put('cart', $cart);

        }

    }

    return back();

}

}