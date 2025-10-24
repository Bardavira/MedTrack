@extends('layouts.app')

@section('title', 'Bem Vindo')

@section('content')
   


                
<h1 class="text-3xl flex justify-center">Bem vindo ao Med-Track</h1>        
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    @endsection