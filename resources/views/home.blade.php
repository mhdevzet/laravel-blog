@extends('layouts.frontend')
@section('content')

<div class="h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @if (Session::has('success'))
        <div class="bg-green-100 text-green-600 px-3 py-2">
            {{Session::get('success')}}
        </div>
        @endif

        <h2 class="text-2xl font-semibold text-center my-3 uppercase">Welcome {{Auth::user()->name}}</h2>
        <form method="POST" action="{{route('logout')}}">
            @csrf
            @method('DELETE')
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Logout
            </button>
        </form>
    </div>
</div>

@endsection