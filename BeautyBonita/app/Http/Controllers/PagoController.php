<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;

class PagoController extends Controller
{
    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Producto de ejemplo',
                    ],
                    'unit_amount' => 1000, // $10.00 (en centavos)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
{
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    
    try {
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        
        // Pasar los datos a la vista
        return view('pagos.exito', [
            'session' => $session,
            'payment_intent' => \Stripe\PaymentIntent::retrieve($session->payment_intent)
        ]);
    } catch (\Exception $e) {
        // Manejar errores (por ejemplo, si la sesión no existe)
        return view('pagos.exito', ['error' => $e->getMessage()]);
    }
}

    public function cancel()
    {
        return view('pagos.cancelado');
    }
}