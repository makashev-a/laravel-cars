@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-6xl uppercase bold">
                Update car
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-10">
        <form action="/cars/{{ $car->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-center max-w-2xl">
                <p class="italic">Current image:</p>
                <img
                    class="w-1/2 my-2"
                    src="{{ asset('images/' . $car->image_path) }}"
                    alt="">
                <input type="file" class="block mb-10 p-2 w-80 italic placeholder-gray-400" name="image">
                <input type="text" class="block shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400" name="name"
                       placeholder="Brand name..." value="{{ $car->name }}">
                <input type="text" class="block shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400" name="founded"
                       placeholder="Founded..." value="{{ $car->founded }}">
                <input type="text" class="block shadow-lg mb-10 p-2 w-80 italic placeholder-gray-400" name="description"
                       placeholder="Description..." value=" {{ $car->description }}">
                <button type="submit" class="bg-green-500 text-white block shadow-lg mb-10 p-2 w-80 uppercase bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
    @if ($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class="text-red-500" list-none>
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
@endsection
