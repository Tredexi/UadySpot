<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    private function getEvents() {
        return collect((new EventController())->index(request())->getData()['events']);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        // Calculamos el total 
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $events = $this->getEvents();
        $event = $events->firstWhere('id', $id);

        if (!$event) return back()->with('error', 'Evento no encontrado');

        $cart = session()->get('cart', []);

        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $event['title'],
                "quantity" => 1,
                "price" => 150.00, 
                "image" => $event['image']
            ];
        }

        session()->put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Evento añadido al carrito');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Eliminado correctamente');
    }
}