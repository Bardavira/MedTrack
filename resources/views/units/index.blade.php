@extends('layouts.app')

@section('title', 'Salas')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto px-4">
        
        <h1 class="text-center text-4xl font-bold mb-6">Salas</h1>

        <div class="mb-4">
            <a href="{{ route('units.store_form') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
               Adicionar Nova Sala
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-blue-400 text-sm text-left">
                <thead class="text-gray-900 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Descrição</th>
                        <th class="px-4 py-2 border"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 border-t">
                        <td class="px-4 py-2 border">{{ $unit->description }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('units.show', $unit->id) }}"
                               class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-1 px-3 rounded shadow">
                               Visualizar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
