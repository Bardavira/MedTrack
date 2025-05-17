<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Sala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body class="bg-blue-50">
    @include ('partials.menu')
    
    <div class="container mt-5">
        <h1 class="text-center text-4xl font-bold mb-6">Criar Sala</h1>
        <form action="{{ route('units.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            
          <!--    <div class="mb-3">
                <label for="wing_id" class="form-label">Ala</label>
                <input type="text" class="form-control" id="wing_id" name="wing" required>
           </div> -->
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</body>
</html>

