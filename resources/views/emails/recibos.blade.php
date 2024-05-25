<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .tarjeta {
            background-color: #f1f1f1;
            padding: 20px;
        }

        h1 {
            color: #313131;
            text-align: center;
            font-size: 50px;
            padding: 30px;
        }

        h2,
        h3 {
            font-size: 1.5em;
            color: #313131;
        }

        .container {
            text-align: center;
            max-width: 600px;
            background-color: white;
            margin: auto;
            padding: 30px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        caption {
            text-align: left;
            color: #b2b2b2;
            font-weight: bold;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
        }

        .precio {
            text-align: right;
            width: 65px;
        }

        .texto {
            margin-top: 20px;
        }

        .subtotal {
            font-size: 15px;
        }

        .total-section {
            margin-top: 20px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="tarjeta">
        <h1>¡Gracias por tu compra!</h1>

        <div class="container">
            <h3>Hola {{ $user->name }},</h3>
            <p class="texto">Gracias por comprar en {{ config('app.name') }}.</p>

            <h2>ID de la factura:</h2>
            <h2>F{{ str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT) }}</h2>

            <table class="cliente">
                <caption>INFORMACIÓN SOBRE TU PEDIDO:</caption>
                <tr>
                    <th>ID del pedido:</th>
                    {{-- <td>F{{ str_pad(mt_rand(0, 9) /* $sale->id */, 5, '0', STR_PAD_LEFT) }}</td> --}}
                    <?php session_start(); 
                    if (!isset($_SESSION['contador'])) { 
                        $_SESSION['contador'] = 0;
                    } 
                    $_SESSION['contador']++; 
                    echo '<td>' . 'F' . str_pad($_SESSION['contador'], 5, '0', STR_PAD_LEFT) . '</td>';
                    ?>
                </tr>
                <tr>
                    <th>Facturado a:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Fecha del pedido:</th>
                    <td>{{ \Carbon\Carbon::now()->locale('es_ES')->isoFormat('LL') }}</td>
                </tr>
                <tr>
                    <th>Fuente:</th>
                    <td>{{ config('app.name') }} Store</td>
                </tr>
            </table>

            <table class="producto">
                <caption>ESTE ES TU PEDIDO:</caption>
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Vendedor</th>
                        <th>Cantidad</th>
                        <th class="precio">Precio</th>
                    </tr>
                </thead>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->distribution->product->name }}</td>
                        <td>{{ $item->distribution->supplier->name }}</td>
                        <td class="precio">{{ $item->quantity }}</td>
                        <td class="precio">S/. {{ number_format($item->distribution->price * $item->quantity, 2) }}
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="total-section">
                <div class="subtotal">
                    <p>Subtotal: S/. {{ number_format($subTotal, 2) }}</p>
                    <p>Impuestos (IGV): S/. {{ number_format($igv, 2) }}</p>
                </div>
                <h3>Total: S/. {{ number_format($subTotal + $igv, 2) }}</h3>
            </div>

            <p class="texto">Guarda una copia de este recibo como referencia.</p>
        </div>
    </div>
    </div>
</body>

</html>
