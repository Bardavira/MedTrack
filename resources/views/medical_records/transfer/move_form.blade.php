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
        <form action="{{ route('medical_records.move_record', $medicalRecord->id) }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="unit_id" class="form-label">Sala Destino</label>
                <select class="form-select" id="unit_id" name="unit_id" required>
                    <option value="">Selecione uma sala</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">
                            {{ $unit->description }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="receptor_id" class="form-label">Usuario</label>
                <select class="form-select" id="receptor_id" name="receptor_id">
                    <option value="">Quem está recebendo o prontuário? (deixe em branco caso esteja pegando pra si)</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
        </form>
    </div>
</body>
</html>
