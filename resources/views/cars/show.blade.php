@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-6xl uppercase bold">
                {{ $car->name }}
            </h1>
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
                    <table class="table-auto">
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
                                    {{ date('d-m-Y', strtotime($car->carProductionDate->created_at)) }}
                                </td>
                            </tr>
                        @empty
                            <p>
                                No car models found
                            </p>
                        @endforelse
                    </table>
                </div>
                <hr class="mt-4 mb-8">
            </div>
        </div>
    </div>


@endsection
