@extends('layouts.app')

@section('title', 'Criar Usuário')

@section('content')
    
    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Criar Usuário</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="first_name" name="name" required>
            </div>



            <div class="mb-3">
                <label for="unit_id" class="form-label">Sala</label>
                <select class="form-select" id="unit_id" name="unit_id">
                    <option value="">Selecione uma sala (opcional)</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">
                            {{ $unit->description }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>

            

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection