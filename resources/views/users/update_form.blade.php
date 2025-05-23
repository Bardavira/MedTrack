<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">
    @include ('partials.menu')
    
    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Atualizar Usuário</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Deixe em branco para manter a senha atual">
            </div>

            <div class="mb-3">
                <label for="unit_id" class="form-label">Sala</label>
                <select class="form-select" id="unit_id" name="unit_id">
                    <option value="">Selecione uma sala (opcional)</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" 
                            @if($user->unit_id == $unit->id) selected @endif>
                            {{ $unit->description }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>
