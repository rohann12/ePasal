@extends('layouts.layout')

@section('title', 'Home')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Welcome to Our Shop</h1>

    <!-- Products Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white shadow-md rounded-lg p-4">
            @if($product->photos->isNotEmpty())
            <img src="{{ asset('storage/' . $product->photos->first()->photo_path) }}" alt="{{ $product->name }}"
                class="w-full h-48 object-cover rounded-t-lg mb-4">
            @else
            <img src="{{ asset('images/default.jpg') }}" alt="Default Image"
                class="w-full h-48 object-cover rounded-t-lg mb-4">
            @endif
            <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-700 mb-2">{{ $product->category->name }}</p>
            <p class="text-green-600 font-bold text-lg mb-4">Rs.{{ number_format($product->price, 2) }}</p>

            <div class="flex justify-between items-center">
                <a href="{{ route('details', $product->id) }}" class="text-blue-500 hover:underline">View
                    Details</a>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Message Section -->
    @if(session('success'))
    <div class="mt-8 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        {{ session('success') }}
    </div>
    @endif
</div>
@endsection