<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de usuários</h1>
        <a href="/users/create" class="btn btn-primary mb-3">Criar novo usuário</a>
        <ul class="list-group">
            @foreach ($users as $user)
                <li class="list-group-item">
                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>