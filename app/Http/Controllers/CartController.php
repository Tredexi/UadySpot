<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CartController extends Controller
{

    // =========================
    // MOSTRAR CARRITO
    // =========================
    public function index()
    {

        $cart = session()->get('cart', []);

        $total = 0;

        // Calcular total
        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];

        }

        return view(
            'cart.index',
            compact('cart', 'total')
        );

    }


    // =========================
    // AGREGAR AL CARRITO
    // =========================
    public function add(Request $request, $id)
    {

        // Buscar evento
        $event = Evento::find($id);

        // Validar existencia
        if (!$event) {

            return back()->with(
                'error',
                'Evento no encontrado'
            );

        }

        // Obtener carrito actual
        $cart = session()->get('cart', []);

        // Si ya existe
        if (isset($cart[$id])) {

            // Límite de 5 boletos
            if ($cart[$id]['quantity'] >= 5) {

                return back()->with(
                    'error',
                    'Máximo 5 boletos por evento.'
                );

            }

            $cart[$id]['quantity']++;

        } else {

            // Nuevo producto
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
                'Evento añadido al carrito.'
            );

    }


    // =========================
    // ELIMINAR DEL CARRITO
    // =========================
    public function remove($id)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);

        }

        return back()->with(
            'success',
            'Evento eliminado del carrito.'
        );

    }


    // =========================
    // AUMENTAR CANTIDAD
    // =========================
    public function increase($id)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            // Máximo 5
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


    // =========================
    // DISMINUIR CANTIDAD
    // =========================
    public function decrease($id)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            // Mínimo 1
            if ($cart[$id]['quantity'] > 1) {

                $cart[$id]['quantity']--;

                session()->put('cart', $cart);

            }

        }

        return back();

    }


    // =========================
    // VISTA DE PAGO
    // =========================
    public function payment()
    {

        $cart = session()->get('cart', []);

        // Carrito vacío
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


    // =========================
    // PROCESAR PAGO
    // =========================
    public function processPayment(Request $request)
    {

        $cart = session()->get('cart', []);

        // Validar carrito
        if (empty($cart)) {

            return redirect()
                ->route('cart.index');

        }

        // Generar código único
        $ticketCode = strtoupper(
            'UADY-' . uniqid()
        );

        // Generar asientos
        $asientos = [];

        $filas = ['A', 'B', 'C', 'D', 'E', 'F'];

        foreach ($cart as $item) {

            for ($i = 0; $i < $item['quantity']; $i++) {

                $fila = $filas[array_rand($filas)];

                $numero = rand(1, 20);

                $asientos[] = $fila . $numero;

            }

        }

        // Guardar ticket
        session()->put('ticket', [

            'code' => $ticketCode,

            'cart' => $cart,

            'asientos' => $asientos,

            'created_at' => now()

        ]);

        // Vaciar carrito
        session()->forget('cart');

        // Redirigir ticket
        return redirect()
            ->route('cart.ticket');

    }


    // =========================
    // MOSTRAR TICKET QR
    // =========================
    public function ticket()
    {

        $ticket = session()->get('ticket');

        // Si no existe ticket
        if (!$ticket) {

            return redirect()
                ->route('events.index');

        }

        return view(
            'cart.ticket',
            compact('ticket')
        );

    }

}