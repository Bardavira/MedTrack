<?php

namespace App\Http\Controllers;

use App\Models\UbsUnit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UbsUnitCreateRequest;
use App\Http\Requests\UbsUnitUpdateRequest; 

class UbsUnitController extends Controller
{
    public function index()
    {
        dump(UbsUnit::all());
    }

    public function store(UbsUnitCreateRequest $request): RedirectResponse
    {
        $request->validated();
        $ubsUnit = new UbsUnit([
            'description' => $request->post('description', ''),
            'wing_id' => $request->post('wind_id', ''),
        ]);
        $ubsUnit->save();

        return redirect('/units');
    }

    public function delete($id): RedirectResponse
    {
        $ubsUnit = UbsUnit::where('id', $id)->firstOrFail();
        $ubsUnit->delete();
        return redirect('/units');
    }

    public function update($id, UbsUnitUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $ubsUnit = UbsUnit::where('id', $id)->firstOrFail();
        $ubsUnit->description = $request->description ? $request->description : $ubsUnit->description;
        $ubsUnit->wing_id = $request->wing_id ? $request->wing_id : $ubsUnit->wing_id;
        $ubsUnit->save();
        return redirect('/units');
    }
    
}