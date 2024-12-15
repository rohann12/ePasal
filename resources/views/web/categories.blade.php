@extends('layouts.layout')

@section('title', 'Categories')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Product Categories</h1>

    <!-- Categories Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('category.products', $category->id) }}">
            <div class="bg-white shadow-md rounded-lg p-4  hover:shadow-teal-500 hover:shadow-lg">
                <!-- Placeholder Image -->
                @if($category->photo_path)
                <img src="{{ asset('storage/' . $category->photo_path) }}" alt=""
                    class="w-full h-48 object-cover rounded-t-lg mb-4">
                @else
                <img src="{{ asset('photos/default.jpg') }}" alt="Default Image"
                    class="w-full h-48 object-cover rounded-t-lg mb-4">
                @endif
                <h2 class="text-xl font-semibold mb-2">{{ $category->name }}</h2>
                <p class="text-gray-700 mb-2">{{ $category->description ?? 'No description available' }}</p>
            </div>
        </a>
        @endforeach
    </div>
    

  
</div>
@endsection
