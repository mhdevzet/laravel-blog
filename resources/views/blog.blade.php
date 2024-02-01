@extends('layouts.frontend')
@section('content')

<div>
    <div class="bg-white shadow-md rounded px-8 py-4 flex items-center mb-10 justify-between">
        <h2 class="text-3xl font-medium">All Post</h2>
        <a href="{{url('add-blog')}}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add Blog
        </a>
    </div>
    @if (!empty($posts) && $posts->isNotEmpty())
    <div class="grid grid-cols-4 gap-8">
        @foreach ($posts as $post)
        <div class="group rounded shadow-md bg-white border">
            <div class="relative aspect-[2/1] bg-gray-100 w-full rounded">
                <span
                    class="absolute right-4 -bottom-2 bg-indigo-600 text-white px-3 py-[2px] text-sm rounded-full">{{$post->category_name}}</span>
            </div>
            <div class="p-5">
                <a href="#"
                    class="text-xl mb-2 font-medium group-hover:text-indigo-600 duration-300 line-clamp-1">{{$post->title}}</a>
                <div class="text-lg text-gray-800 line-clamp-4">{{$post->content}}</div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@endsection