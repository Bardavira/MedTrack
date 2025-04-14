<div class="container">
    <h1>Medical Records</h1>
    <table class="table table-striped">
        <div class="mb-3">
            <a href="{{ route('medical_records.store_form') }}" class="btn btn-success">Add New Record</a>
        </div>
        <thead>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Active</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicalRecords as $record)
                <tr>
                    <td>{{ $record->first_name }}</td>
                    <td>{{ $record->last_name }}</td>
                    <td>{{ $record->active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>