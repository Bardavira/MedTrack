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
        <form action="{{ route('medical_records.transfer.move_form', $medicalRecord->id) }}" method="POST">
            @method('PUT')
            @csrf
            
            <div class="mb-3">
                <label for="unit_id" class="form-label">Sala Destino</label>
                <select class="form-select" id="unit_id" name="unit_id" required>
                    <option value="">Selecione uma sala</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ $unit->id == $medicalRecord->unit_id ? 'selected' : '' }}>
                            {{ $unit->description }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="record" class="form-label">Prontuário Selecionado</label>
                <select class="form-select" id="receptor_id" name="receptor_id" required>
                    <option value="">Selecione um destinatário</option>
                    @foreach($records as $record)
                        <option value="{{ $record->id }}" {{ $record->id == $receptor_id ? 'selected' : '' }}>
                            {{ $record->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
            <a href="{{ route('medical_records.transfer.thanks') }}" class="btn btn-success">Atualizar Prontuário</a>
        </div>
        </form>
    </div>
</body>
</html>
