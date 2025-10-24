@extends('layouts.app')

@section('title', 'Mostrar Usuário')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">

    <div class="flex justify-between flex-wrap gap-6 items-start mb-8">
        <div class="space-y-2">
            <h1 class="text-3xl font-bold">Usuário</h1>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Sala:</strong> {{ $user->unit->description ?? '-' }}</p>
        </div>

        <div>
            <a href="{{ route('users.update_form', $user->id) }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
               Atualizar Usuário
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div>
            <h2 class="text-xl font-bold mb-4">Movimentações Pelo Usuário</h2>
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
                    @foreach($movedMedicalRecords as $record)
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

        <div>
            <h2 class="text-xl font-bold mb-4">Movimentações Para o Usuário</h2>
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
                    @foreach($actualMedicalRecords as $record)
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

</div>
@endsection
