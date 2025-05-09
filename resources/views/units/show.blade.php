<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Sala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">

@include ('partials.menu')

<div class="container py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            
        <p><strong>Descrição:</strong> {{ $unit->description }}</p>
       <!--   <p><strong>Ala:</strong> {{ $unit->wing_id }}</p> -->
            
        </div>
        <div>
            <a href="{{ route('units.update_form', $unit->id) }}" class="btn btn-success">Atualizar Sala</a>
        </div>
    </div>