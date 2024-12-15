@extends('layouts.layout')

@section('title', 'Your Cart')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Your Cart</h1>

    @if ($cartItems->isEmpty())
    <div class="text-center text-lg">Your cart is empty.</div>
    @else
    <div class="bg-white shadow-md rounded-lg p-6">
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Product</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                <tr>
                    <td class="px-4 py-2">{{ $cartItem->product->name }}</td>
                    <td class="px-4 py-2">Rs.{{ number_format($cartItem->product->price, 2) }}</td>
                    <td class="px-4 py-2">{{ $cartItem->quantity }}</td>
                    <td class="px-4 py-2">Rs.{{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 flex justify-between">
            <div class="font-semibold text-lg">Total: Rs.{{ number_format($totalPrice, 2) }}</div>
            <a href="{{ route('checkout') }}" class="px-6 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">
                Proceed to Checkout
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
