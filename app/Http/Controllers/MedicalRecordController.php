<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Http\Requests\CreateMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Models\MedicalRecordUnit;
use App\Models\UbsUnit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function index() 
    {
        $medicalRecords = MedicalRecord::all();

        return view('medical_records.index', compact('medicalRecords'));
    }

    public function show(int $id) 
    {
        $medicalRecord = MedicalRecord::find($id);

        $history = $medicalRecord->medicalRecordUnitHistory()->orderBy('id', 'desc')->get();

        return view('medical_records.show', compact('medicalRecord', 'history'));
    }

    public function store(CreateMedicalRecordRequest $request) 
    {
        $request->validated();

        $medicalRecord = new MedicalRecord([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'active' => 1
        ]);

        $medicalRecord->save();

        return redirect()->route('medical_records.index');
    }

    public function storeForm() 
    {
        return view('medical_records.store_form');
    }

    public function updateForm(int $id) 
    {
        $medicalRecord = MedicalRecord::find($id);

        return view('medical_records.update_form', compact('medicalRecord'));
    }
    
    public function update(UpdateMedicalRecordRequest $request, $id) 
    {
        $request->validated();

        $medicalRecord = MedicalRecord::find($id);

        $medicalRecord->update([
            'first_name' => $request->first_name ?? $medicalRecord->first_name,
            'last_name' => $request->last_name ?? $medicalRecord->last_name,
        ]);

        $medicalRecord->save();

        return redirect()->route('medical_records.index');
    }

    public function moveRecordForm(int $id)
    {
        $userUnit = Auth::user()->unit;
        $users = User::all();
        $units = UbsUnit::all();

        $medicalRecord = MedicalRecord::find($id);

        return view('medical_records.move_form', compact('medicalRecord', 'userUnit', 'units', 'users'));
    }

    public function moveRecord(int $id, Request $request)
    {
        $user = Auth::user();
        
        MedicalRecordUnit::where([
            'medical_record_id' => $id
        ])->update(['active' => 0]);

        MedicalRecordUnit::new([
            'user_id' => $user->id,
            'unit_id' => $request->unit_id,
            'receptor_id' => $request->receptor_id ?? $user->id,
            'medical_record_id' => $id,
            'active' => 1
        ])->save();
        
        return view('medical_records.thanks');
    }
}
