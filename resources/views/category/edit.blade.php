@extends('layouts.adminLayout')
@section('heading', 'Edit Category')
@section('subheading', 'Edit the details of the category')
@section('title', 'Edit Category')

@section('content')
<div class="w-full max-w-3xl mx-auto bg-white p-6 my-3 rounded-lg shadow-md">
    <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
                value="{{ old('name', $category->name) }}" 
                required
            >
            @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="4" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"
            >{{ old('description', $category->description) }}</textarea>
            @error('description')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="px-6 py-2 text-white bg-emerald-500 rounded-md hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
            >
                Update Category
            </button>
        </div>
    </form>
</div>
@endsection
