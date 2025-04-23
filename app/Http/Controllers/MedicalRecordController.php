<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Http\Requests\CreateMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;

class MedicalRecordController extends Controller
{
    public function index() {
        $medicalRecords = MedicalRecord::all();

        return view('medical_records.index', compact('medicalRecords'));
    }

    public function store(CreateMedicalRecordRequest $request) {
        $request->validated();

        $medicalRecord = new MedicalRecord([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'active' => 1
        ]);

        $medicalRecord->save();

        return redirect()->route('medical_records.index');
    }

    public function storeForm() {
        return view('medical_records.store_form');
    }

    public function updateForm(int $id) {
        $medicalRecord = MedicalRecord::find($id);

        return view('medical_records.update_form', compact('medicalRecord'));
    }
    
    public function update(UpdateMedicalRecordRequest $request, $id) {
        $request->validated();

        $medicalRecord = MedicalRecord::find($id);

        $medicalRecord->update([
            'first_name' => $request->first_name ?? $medicalRecord->first_name,
            'last_name' => $request->last_name ?? $medicalRecord->last_name,
        ]);

        $medicalRecord->save();

        return redirect()->route('medical_records.index');
    }
}
