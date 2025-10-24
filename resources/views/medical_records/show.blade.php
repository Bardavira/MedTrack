@extends('layouts.app')

@section('title', 'Mostrar Prontuários')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">

    <div class="flex justify-between flex-wrap gap-6 items-start mb-8">
        
        <div class="space-y-2">
            <h1 class="text-3xl font-bold">Detalhes do Prontuário</h1>
            <p><strong>Número do Prontuário:</strong> {{ $medicalRecord->first_name }}</p>
            <p><strong>Endereço:</strong> {{ $medicalRecord->last_name }}</p>
            <p><strong>Ativo:</strong> {{ $medicalRecord->active ? 'Sim' : 'Não' }}</p>
        </div>

        <div class="text-center">
            <h2 class="text-xl font-semibold mb-4">Cole no seu prontuário:</h2>
            <img src="{{ $qrCodeLink }}" class="mx-auto w-40 h-40 object-contain" alt="QR Code">
        </div>

        <div>
            <a href="{{ route('medical_records.update_form', $medicalRecord->id) }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
               Atualizar Prontuário
            </a>
        </div>

    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Movimentações</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-blue-400 text-sm text-left">
                <thead class="text-gray-900 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Movimentador</th>
                        <th class="px-4 py-2 border">Receptor</th>
                        <th class="px-4 py-2 border">Sala</th>
                        <th class="px-4 py-2 border">Data</th>
                        <th class="px-4 py-2 border">Prontuário</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($history as $record)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 border-t">
                        <td class="px-4 py-2 border">{{ $record->actor->name }}</td>
                        <td class="px-4 py-2 border">{{ $record->receptor->name }}</td>
                        <td class="px-4 py-2 border">{{ $record->unit->description }}</td>
                        <td class="px-4 py-2 border">{{ $record->created_at }}</td>
                        <td class="px-4 py-2 border">
                            {{ $record->medicalRecord->first_name }} {{ $record->medicalRecord->last_name }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
