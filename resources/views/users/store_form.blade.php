<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">
    @include ('partials.menu')
    
    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Criar Usuário</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="first_name" name="Nome" required>
            </div>
            
            
            <div class="mb-3">
                <label for="unit_id" class="form-label">Sala</label>
                <select class="form-select" id="unit_id" name="unit_id" required>
                    <option value="">Selecione uma sala</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->description }}</option>
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
