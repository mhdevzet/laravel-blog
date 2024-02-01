@extends('layouts.frontend')
@section('content')

<div>
    <div class="bg-white shadow-md rounded px-8 py-4 flex items-center mb-10 justify-between">
        <h2 class="text-3xl font-medium">Add Category</h2>
    </div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('category')}}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                Category Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="category" type="text" name="name" placeholder="Category Name">
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Submit
            </button>
        </div>
    </form>

    <div class="bg-white shadow-md rounded px-8 py-4 flex items-center mb-10 justify-between">
        <h2 class="text-3xl font-medium">All Category</h2>
    </div>
    @if (!empty($categories) && $categories->isNotEmpty())
    <ul class="list-decimal list-inside">
        @foreach ($categories as $category)
        <li>
            {{$category->name}}
        </li>
        @endforeach
    </ul>
    @endif
</div>

@endsection