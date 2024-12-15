@extends('layouts.adminLayout')
@section('heading', 'Create Category')
@section('subheading', 'Add a new category')
@section('title', 'Create Category')

@section('content')


<div class="w-full max-w-3xl mx-auto bg-white p-6 my-3 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Add New Product</h2>
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
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                value="{{ old('name') }}">
            @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                class="mt-1 block p-2 w-full  border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <!-- Photo Field -->
        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Category Photo</label>
            <input type="file" name="photo" id="photo"
                class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:bg-teal-500 file:text-white">
            @error('photo')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                Create Category
            </button>
        </div>
    </form>
</div>
@endsection