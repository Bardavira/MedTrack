<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">

@include ('partials.menu')

<div class="container py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Sala:</strong> {{ $user->unit_id }}</p>
        </div>
        <div>
            <a href="{{ route('users.update_form', $user->id) }}" class="btn btn-success">Atualizar Usuário</a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">
        
        <div>
            <h2 class="text-xl font-bold mb-4">Movimentações Pelo Usuario</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Movimentador</th>
                        <th>Receptor</th>
                        <th>Sala</th>
                        <th>Data</th>
                        <th>Prontuário</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movedMedicalRecords as $record)
                        <tr>
                            <td>{{ $record->actor->name }}</td>
                            <td>{{ $record->receptor->name }}</td>
                            <td>{{ $record->unit->description }}</td>
                            <td>{{ $record->created_at }}</td>
                            <td>{{ $record->medicalRecord->first_name }} {{ $record->medicalRecord->last_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        <div>
            <h2 class="text-xl font-bold mb-4">Movimentações Para o Usuario</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Movimentador</th>
                        <th>Receptor</th>
                        <th>Sala</th>
                        <th>Data</th>
                        <th>Prontuário</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actualMedicalRecords as $record)
                        <tr>
                            <td>{{ $record->actor->name }}</td>
                            <td>{{ $record->receptor->name }}</td>
                            <td>{{ $record->unit->description }}</td>
                            <td>{{ $record->created_at }}</td>
                            <td>{{ $record->medicalRecord->first_name }} {{ $record->medicalRecord->last_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
