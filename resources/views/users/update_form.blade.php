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
        <h1>Atualizar Usuário</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{$user->name}}" required>
            </div>
            

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="{{$user->email}}" required>

            </div>

            <div class="mb-3">
                <label for="unit_id" class="form-label">Sala</label>
                <input type="text" class="form-control" id="unit_id" name="unit_id" placeholder="{{$user->unit_id}}" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>




