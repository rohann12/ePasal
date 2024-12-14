@extends('layouts.layout')

@section('title', $product->name)

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/' . $product->photos->first()->photo_path) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg">
            </div>
            <div class="md:w-1/2 md:pl-8 mt-6 md:mt-0">
                <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-lg text-gray-700 mb-4">{{ $product->description }}</p>
                <p class="text-2xl font-semibold mb-6">${{ $product->price }}</p>
                
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
