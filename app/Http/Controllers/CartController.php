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
        foreach ($cart as $item) {
            $total +=
                $item['price'] *
                $item['quantity'];
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
        $event = Evento::find($id);
        if (!$event) {
            return back()->with(
                'error',
                'Evento no encontrado'
            );
        }
        $cart = session()->get('cart', []);

        // SI YA EXISTE
        if (isset($cart[$id])) {

            // LÍMITE 5 BOLETOS
            if ($cart[$id]['quantity'] >= 5) {
                return back()->with(
                    'error',
                    'Máximo 5 boletos por evento.'
                );
            }
            $cart[$id]['quantity']++;
        } else {

            // NUEVO EVENTO
            $cart[$id] = [
                "title" => $event->titulo,
                "quantity" => 1,
                "price" => $event->precio,
                "image" => $event->imagen
            ];
        }
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

        // CARRITO VACÍO
        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Tu carrito está vacío.'
                );
        }

        // TOTAL
        $total = 0;
        foreach ($cart as $item) {
            $total +=
                $item['price'] *
                $item['quantity'];
        }

        // TARJETA GUARDADA
        $savedCard = session()->get('saved_card');
        return view(
            'cart.payment',
            compact(
                'cart',
                'total',
                'savedCard'
            )
        );

    }


    // =========================
    // PROCESAR PAGO
    // =========================
    public function processPayment(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()
                ->route('cart.index');
        }

        // =========================
        // VALIDACIONES
        // =========================
        $request->validate([
            'card_number' => 'required',
            'card_name' => 'required',
            'expiration' => [
                'required',
                'regex:/^(0[1-9]|1[0-2]|[1-9])\/([0-9]{2})$/'
            ],
            'cvv' => 'required|digits:3'
        ]);



        // =========================
        // GUARDAR TARJETA
        // =========================
        if ($request->has('save_card')) {
            $cleanCard = str_replace(
                ' ',
                '',
                $request->card_number
            );

            session()->put('saved_card', [
                'number' => $request->card_number,
                'last_four' => substr($cleanCard, -4),
                'name' => $request->card_name,
                'expiration' => $request->expiration
            ]);
        }



        // =========================
        // GENERAR TICKET
        // =========================
        $ticketCode = strtoupper(
            'UADY-' . uniqid()
        );



        // =========================
        // GENERAR ASIENTOS
        // =========================
        $asientos = [];
        $filas = ['A', 'B', 'C', 'D', 'E', 'F'];
        foreach ($cart as $item) {
            for ($i = 0; $i < $item['quantity']; $i++) {
                $fila = $filas[array_rand($filas)];
                $numero = rand(1, 20);
                $asientos[] = $fila . $numero;
            }
        }



        // =========================
        // GUARDAR TICKET
        // =========================
        session()->put('ticket', [
            'code' => $ticketCode,
            'cart' => $cart,
            'asientos' => $asientos,
            'created_at' => now()
        ]);



        // =========================
        // LIMPIAR CARRITO
        // =========================
        session()->forget('cart');



        // =========================
        // REDIRIGIR AL QR
        // =========================
        return redirect()
            ->route('cart.ticket');
    }


    // =========================
    // MOSTRAR TICKET QR
    // =========================
    public function ticket()
    {
        $ticket = session()->get('ticket');
        if (!$ticket) {
            return redirect()
                ->route('events.index');
        }

        return view(
            'cart.ticket',
            compact('ticket')
        );
    }

    // =========================
    // ELIMINAR TARJETA GUARDADA
    // =========================
    public function deleteSavedCard()
    {

        session()->forget('saved_card');

        return back()->with(
            'success',
            'Tarjeta eliminada correctamente.'
        );

    }

}