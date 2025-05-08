<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Medical Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-blue-50">

    @include('partials.menu')

    <div class="py-6">
        <div class="container">
            <h1 class="text-center text-4xl font-bold mb-6">Prontuários</h1>

            <div class="mb-3">
                <a href="{{ route('medical_records.store_form') }}" class="btn btn-success mt-4">Adicionar Novo Prontuário</a> 
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered border border-blue-400">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Sobreome</th>
                            <th>Ativo</th>
                            <th>Sala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicalRecords as $record)
                            <tr>
                                <td>{{ $record->first_name }}</td>
                                <td>{{ $record->last_name }}</td>
                                <td>{{ $record->active ? 'Yes' : 'No' }}</td>
                                <td>{{ $record->unit_id }}</td>
                                <td>
                                    <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
