<?php

namespace App\Http\Controllers;

use App\Models\UbsUnit;
use App\Models\UbsWing;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UbsUnitCreateRequest;
use App\Http\Requests\UbsUnitUpdateRequest;
use Illuminate\Support\Facades\Auth;

class UbsUnitController extends Controller
{
    private $user;

    private $company_id;

    public function __construct()
    {
        $this->user =  Auth::user();
        $this->company_id = $this->user->company_id;
    }

    public function index()
    {
        $units = UbsUnit::where('company_id', $this->company_id)->get();

        return view('units.index', compact('units'));
    }

    public function show(int $id)
    {
        $unit = UbsUnit::find($id);

        return view('units.show', compact('unit'));
    }

    public function storeForm() 
    {
        $wings = UbsWing::all();

        return view('units.store_form', compact('wings'));
    }

    public function updateForm(int $id) 
    {
        $unit = UbsUnit::find($id);
        $wings = UbsWing::all();

        return view('units.update_form', compact('unit', 'wings'));
    }

    public function store(UbsUnitCreateRequest $request): RedirectResponse
    {
        $ubsUnit = new UbsUnit([
            'description' => $request->post('description', ''),
            'wing_id'     => $request->post('wing_id'),
            'company_id'  => $this->company_id,
        ]);
        $ubsUnit->save();

        return redirect()->route('units.index');
    }

    public function delete($id): RedirectResponse
    {
        $ubsUnit = UbsUnit::where('id', $id)->firstOrFail();
        $ubsUnit->delete();

        return redirect()->route('units.index');
    }

    public function update($id, UbsUnitUpdateRequest $request): RedirectResponse
    {
        $ubsUnit = UbsUnit::where('id', $id)->firstOrFail();

        $ubsUnit->update([
            'description' => $request->description ?? $ubsUnit->description,
            'wing_id' => $request->wing_id ?? $ubsUnit->wing_id,
        ]);
        $ubsUnit->save();

        return redirect()->route('units.index');
    }
}