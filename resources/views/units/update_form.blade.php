<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Sala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body class="bg-blue-50">
@include ('partials.menu')
    <div class="container mt-5">
        <h1>Atualizar Sala</h1>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>