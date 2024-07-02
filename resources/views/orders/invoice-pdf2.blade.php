<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>Nota de Venta</h1>
        <h2>Client: {{ $order->cliente->nombre }}</h2>
        <p>Email: {{ $order->cliente->email }}</p>
        <p>Phone: {{ $order->cliente->telefono }}</p>

        <h3>Order Details</h3>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>Product</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Total</td>
            </tr>
            @foreach ($order->items as $item)
                <tr class="item">
                    <td>{{ $item->product->nombre }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
        </table>

        @php
            $subtotal = $order->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            $iva = $subtotal * 0.15;
        @endphp

        <p>Subtotal: ${{ number_format($subtotal, 2) }}</p>
        <p>IVA (15%): ${{ number_format($iva, 2) }}</p>
        <p>Shipping Cost: ${{ number_format($order->shipping_cost, 2) }}</p>
        <h3>Total: ${{ number_format($order->total, 2) }}</h3>
    </div>
</body>
</html>