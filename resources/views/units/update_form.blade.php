@extends('layouts.app')

@section('title', 'Atualizar Sala')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Atualizar Sala</h1>
        <form action="{{ route('units.update', $unit->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="{{$unit->description}}" required>
            </div>
           <!--    <div class="mb-3">
                <label for="wing->id" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="wing->id" name="wing->id" placeholder="{{$unit->wing_id}}" required>
            </div> -->
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection