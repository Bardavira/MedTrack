@extends('layouts.app')

@section('title', 'Atualizar Prontuários')

@section('content')

    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Atualizar Prontuário</h1>
        <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">Número do Prontuário</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $medicalRecord->first_name }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $medicalRecord->last_name }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

@endsection


