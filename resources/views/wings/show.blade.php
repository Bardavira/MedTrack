<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Ala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">

@include ('partials.menu')

<div class="container py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <p><strong>Descrição:</strong> {{ $wings->description }}</p>
            
        </div>
        <div>
            <a href="{{ route('wings.update_form', $wings->id) }}" class="btn btn-success">Atualizar Ala</a>
        </div>
    </div>
</div>
</body>
</html>