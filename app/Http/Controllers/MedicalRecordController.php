<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicalRecordRequest;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index() {
        $medicalRecords = MedicalRecord::all();

        return view('medical_records.index', compact('medicalRecords'));
    }

    public function store(CreateMedicalRecordRequest $request) {
        // dd($request);
        $request->validated();

        $medicalRecord = new MedicalRecord([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'active' => 1
        ]);

        $medicalRecord->save();

        return redirectRoute('medical_records.index');
    }
}
