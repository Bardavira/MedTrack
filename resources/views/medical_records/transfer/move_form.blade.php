<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body class="bg-blue-50">

    <div class="container mt-5">
        <h1>Mover Prontuário</h1>
        <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="medicalRecord->unit_id" class="form-label">Sala Destino</label>
                <input type="text" class="form-control" id="medicalRecord->unit_id" name="first_name" placeholder="{{$medicalRecord->unit_id}}" required>
            </div>
            <div class="mb-3">
                <label for="receptor_id" class="form-label">Destinatário</label>
                <input type="text" class="form-control" id="receptor_id" name="destinatario" placeholder="{{$receptor_id}}" required>
            </div>
            <td>
                <a href="{{ route('medical_records.transfer.thanks' }}" class="btn btn-primary btn-sm">View</a>
            </td>
        </form>
    </div>
</body>
</html>