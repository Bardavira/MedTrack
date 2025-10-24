@extends('layouts.app')

@section('title', 'Mostrar Salas')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">

    <div class="flex justify-between flex-wrap gap-4 items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold mb-2">Sala</h1>
            <p><strong>Descrição:</strong> {{ $unit->description }}</p>
            {{-- <p><strong>Ala:</strong> {{ $unit->wing_id }}</p> --}}
        </div>

        <div>
            <a href="{{ route('units.update_form', $unit->id) }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
               Atualizar Sala
            </a>
        </div>
    </div>

</div>
@endsection
