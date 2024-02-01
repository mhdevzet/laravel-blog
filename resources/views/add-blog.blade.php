@extends('layouts.frontend')
@section('content')

<div>
    <div class="bg-white shadow-md rounded px-8 py-4 flex items-center mb-10 justify-between">
        <h2 class="text-3xl font-medium">Add Blog</h2>
        <a href="{{route('blog')}}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            All Blog
        </a>
    </div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('blog')}}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Blog Title
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="title" type="text" name="title" placeholder="Blog Title">
        </div>
        <div class="mb-4">
            <div class=" mb-2 flex items-center justify-between gap-2">
                <label class="text-gray-700 text-sm font-bold" for="category">
                    Category
                </label>
                <a href="{{url('category')}}" class="underline text-sm text-indigo-600 font-medium">Add Category</a>
            </div>
            <select name="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="category">
                <option value="">Select Category</option>
                @if (!empty($categories) && $categories->isNotEmpty())
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                Description
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="content" type="text" name="description" placeholder="Blog Description"></textarea>
        </div>
        <div class="mb-4">
            <p class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Published
            </p>
            <label for="active" class="inline-flex items-center gap-1"><input type="radio" value="true" name="published"
                    id="active">Active</label>
            <label for="inactive" class="inline-flex items-center gap-1"><input type="radio" value="false"
                    name="published" id="inactive">Inactive</label>
        </div>


        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Submit
            </button>
        </div>
    </form>


</div>

@endsection