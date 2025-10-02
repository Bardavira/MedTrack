@extends('layouts.app')

@section('title', 'Prontuários')

@section('content')
    <div class="py-6">
        <div class="container">
            <h1 class="text-center text-4xl font-bold mb-6">Prontuários</h1>

            <div class="mb-3">
                <a href="{{ route('medical_records.store_form') }}" class="btn btn-success mt-4">Adicionar Novo Prontuário</a> 
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered border border-blue-400">
                    <thead class="table-light">
                        <tr>
                            <th>Numero</th>
                            <th>Endereço</th>
                            <th>Ativo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicalRecords as $record)
                            <tr>
                                <td>{{ $record->first_name }}</td>
                                <td>{{ $record->last_name }}</td>
                                <td>{{ $record->active ? 'Sim' : 'Não' }}</td>
                                <td>
                                    <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

