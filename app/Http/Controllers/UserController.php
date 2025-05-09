<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UbsUnit;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(int $id)
    {
        $user = User::find($id);

        $movedMedicalRecords = $user->medicalRecordUnitsMoved()->orderBy('id', 'desc')->get();

        $actualMedicalRecords = $user->medicalRecordUnitsReceived()->orderBy('id', 'desc')->get();

        return view('users.show', compact('user', 'movedMedicalRecords', 'actualMedicalRecords'));
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->delete();
    }

    public function storeForm() 
    {
        $units = UbsUnit::all();

        return view('users.store_form', compact('units'));
    }

    public function updateForm(int $id) 
    {
        $user = User::find($id);
        $units = UbsUnit::all();

        return view('users.update_form', compact('user', 'units'));
    }
  
    public function update(int $id, UserUpdateRequest $request): RedirectResponse
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->email = $request->email ? $request->email : $user->email;
        $user->name = $request->name ? $request->name : $user->name;
        $user->password = $request->password ? $request->password : $user->password;
        $user->unit_id = $request->unit_id ? $request->unit_id : $user->unit_id;
        $user->save();
        return redirect()->route('users.index');
    }

    public function store(UserCreateRequest $request): RedirectResponse
    {
        $user = new User([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            'unit_id' => $request->unit_id
        ]);

        $user->save();

        return redirect()->route('users.index');
    }
}