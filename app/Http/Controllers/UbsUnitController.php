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

    public function __construct()
    {
        $this->user =  Auth::user();
    }

    public function index()
    {
        $units = UbsUnit::where('company_id', $this->user->company->id)->get();

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
            'wing_id' => $request->post('wing_id'),
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

        $ubsUnit->description = $request->description ? $request->description : $ubsUnit->description;
        $ubsUnit->wing_id = $request->wing_id ? $request->wing_id : $ubsUnit->wing_id;
        $ubsUnit->save();

        return redirect()->route('units.index');
    }
}