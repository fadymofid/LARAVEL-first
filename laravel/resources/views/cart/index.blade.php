@extends('layout')

@section('title', 'Cart')

@section('content')
    <div class="container">
        <h1 class="mb-4">Your Cart</h1>

        @if(empty($cart) || count($cart) === 0)
            <p>Your cart is empty.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $productId => $item)
                    @php
                        $itemTotal = $item['quantity'] * $item['price'];
                        $total += $itemTotal;
                    @endphp
                    @if(isset($item['name']) && $item['name'] !== 'Unknown')
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($itemTotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $productId) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>

                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>${{ number_format($total, 2) }}</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

            <!-- Proceed to Checkout Button -->
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        @endif
    </div>
@endsection
