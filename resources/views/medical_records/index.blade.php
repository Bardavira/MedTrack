@extends('layouts.app')

@section('title', 'Prontuários')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-center text-4xl font-bold mb-6">Prontuários</h1>

        <div class="mb-4">
            <a href="{{ route('medical_records.store_form') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
               Adicionar Novo Prontuário
            </a>
        </div>

       <div class="overflow-x-auto">
    <table class="min-w-full border border-blue-400 text-sm text-left">
        <thead class="text-gray-900 dark:text-gray-100">
            <tr>
                <th class="px-4 py-2 border">Numero</th>
                <th class="px-4 py-2 border">Endereço</th>
                <th class="px-4 py-2 border">Ativo</th>
                <th class="px-4 py-2 border"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($medicalRecords as $record)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 border-t">
                <td class="px-4 py-2 border">{{ $record->first_name }}</td>
                <td class="px-4 py-2 border">{{ $record->last_name }}</td>
                <td class="px-4 py-2 border">
                    {{ $record->active ? 'Sim' : 'Não' }}
                </td>
                <td class="px-4 py-2 border text-center">
                    <a href="{{ route('medical_records.show', $record->id) }}"
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
