@extends('layouts.app')

@section('title', 'Criar Prontuários')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Criar Prontuário</h1>
        <form action="{{ route('medical_records.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">Número do Prontuário</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            <div class="mb-3">
                <label for="active" class="form-label">Ativo</label>
                <select class="form-select" id="active" name="active" required>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>

@endsection
