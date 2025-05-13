<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UbsUnit;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordUnit;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\MoveMedicalRecordRequest;
use App\Http\Requests\CreateMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use Illuminate\Support\Facades\Storage;

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

        $qrCode = QrCode::size(300)->format('png')->generate(route('medical_records.move_record', ['id' => $id]));

        $qrCodeImage = Storage::disk('public')->put($id . ".png", $qrCode);

        $qrCodeLink = Storage::url($id . '.png');


        return view('medical_records.show', compact('medicalRecord', 'history', 'qrCodeLink'));
    }

    public function store(CreateMedicalRecordRequest $request) 
    {
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

        return view('medical_records.transfer.move_form', compact('medicalRecord', 'userUnit', 'units', 'users'));
    }

    public function moveRecord(int $id, MoveMedicalRecordRequest $request)
    {
        $user = Auth::user();
        
        MedicalRecordUnit::where([
            'medical_record_id' => $id
        ])->update(['active' => 0]);

        new MedicalRecordUnit([
            'user_id' => $user->id,
            'unit_id' => $request->unit_id,
            'receptor_id' => $request->receptor_id ?? $user->id,
            'medical_record_id' => $id,
            'active' => 1
        ])->save();
        
        return view('medical_records.transfer.thanks');
    }
}
