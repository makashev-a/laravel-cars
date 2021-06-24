@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-6xl uppercase bold">
                {{ $car->name }}
            </h1>
            <img
                src="{{ asset('images/' . $car->image_path) }}"
                alt=""
                class="w-8/12 block mx-auto my-3">
        </div>

        <div class="py-10 text-center">
            <div class="m-auto">

                <span class="uppercase text-blue-500 font-bold text-sm italic">
                    Founded: {{ $car->founded }}
                </span>

                <p class="text-lg text-gray-700 py-6">
                    {{ $car->description }}
                </p>

                <p class="text-lg text-gray-700 py-3">
                    Models:
                </p>

                <div class="inline-block items-center">

                    <table class="table-auto mx-auto">
                        <tr class="bg-blue-100">
                            <th class="w-1/3 p-2 border-2 border-gray-700">
                                Model
                            </th>
                            <th class="w-1/3 p-2 border-2 border-gray-700">
                                Engines
                            </th>
                            <th class="w-1/3 p-2 border-2 border-gray-700">
                                Date
                            </th>
                        </tr>

                        @forelse ($car->carModels as $model)
                            <tr>
                                <td class="p-2 border-2 border-gray-700">
                                    {{ $model->model_name }}
                                </td>

                                <td class="p-2 border-2 border-gray-700">
                                    @foreach ($car->engines as $engine)
                                        @if ($model->id == $engine->model_id)
                                            {{ $engine->engine_name }}
                                        @endif
                                    @endforeach
                                </td>

                                <td class="p-2 border-2 border-gray-700">
                                    @foreach($car->carProductionDate as $date)
                                        @if ($model->id == $date->model_id)
                                            {{ date('d-m-Y', strtotime($date->created_at)) }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <p class="mb-2">
                                No car models found
                            </p>
                        @endforelse
                    </table>

                    <p class="text-left pt-2">
                        Product types:
                        @forelse ($car->products as $product)
                            {{ $product->name }}@if(!$loop->last),@endif
                    @empty
                        No car product description
                        @endforelse
                        </p>
                </div>
                <hr class="mt-4 mb-8">
            </div>
        </div>
    </div>
@endsection
