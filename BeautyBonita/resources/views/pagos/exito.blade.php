@isset($session)
    <h1>¡Gracias por tu compra!</h1>
    
    <p>ID de transacción: {{ $session->id }}</p>
    <p>Monto: ${{ number_format($session->amount_total / 100, 2) }}</p>
    <p>Estado: {{ $session->payment_status }}</p>
    <p>Correo del cliente: {{ $session->customer_details->email ?? 'N/A' }}</p>
    
    @isset($payment_intent)
        <p>Método de pago: {{ $payment_intent->payment_method_types[0] ?? 'N/A' }}</p>
    @endisset
    
    <a href="{{ url('/') }}">Volver al inicio</a>
@else
    <div class="alert {{ isset($error) ? 'alert-danger' : 'alert-warning' }}">
        {{ $error ?? 'No se encontraron datos de transacción.' }}
    </div>
@endisset