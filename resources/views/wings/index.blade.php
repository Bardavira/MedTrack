<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">

@include ('partials.menu')

<div class="container">
    <h1 class="text-center text-4xl font-bold mb-6">Wings</h1>

    <div class="mb-3">
        <a href="#" class="btn btn-success mt-4">Add New Wing</a>
        
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wings as $wing)
                <tr>
                    <td>{{ $wing->name }}</td>
                    <td>{{ $wing->unit->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('wings.show', $wing->id) }}" class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
