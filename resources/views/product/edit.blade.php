@extends('layouts.adminLayout')

@section('heading', 'Edit Product')
@section('subheading', 'Update Product Details')
@section('title', 'Edit Product')

@section('button')
<div class="flex h-20 items-center justify-end px-5">
    <a href="{{ route('product.index') }}">
        <button class="px-10 py-2 text-white bg-teal-500 rounded-md" type="button">
            Back to Products
        </button>
    </a>
</div>
@endsection

@section('content')
<div class="w-full mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Edit Product</h2>

    <!-- Display validation errors globally -->
    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                value="{{ old('name', $product->name) }}" required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                required>{{ old('description', $product->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                value="{{ old('price', $product->price) }}" required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Quantity -->
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                value="{{ old('quantity', $product->quantity) }}" required>
            @error('quantity')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category Selection -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="category_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ?
                    'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Photos Display -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Current Product Photos</label>
            <div class="flex gap-4 mt-2">
                
                @foreach($product->photos as $photo)
                {{-- @dd($photo) --}}
                <div class="relative">
                    <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Product Photo"
                        class="w-24 h-24 object-cover rounded-md shadow-md">

                </div>
                @endforeach
            </div>
        </div>

        <!-- Photos Upload -->
        <div class="mb-4">
            <label for="photos" class="block text-sm font-medium text-gray-700">Product Photos</label>
            <input type="file" name="photos[]" id="photos"
                class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:bg-teal-500 file:text-white"
                multiple>
            @error('photos')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-4 flex justify-end">
            <button type="submit" class="px-6 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection