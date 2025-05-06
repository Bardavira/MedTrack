<?php

namespace App\Http\Controllers;

use App\Models\UbsWing;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UbsWingCreateRequest;
use App\Http\Requests\UbsWingUpdateRequest;

class UbsWingController extends Controller
{
    public function index()
    {
        $wings = UbsWing::all();

        return view('wings.index', compact('wings'));
    }

    public function show(int $id)
    {
        $wing = UbsWing::find($id);

        return view('wings.index', compact('wing'));
    }

    public function storeForm() 
    {
        return view('wings.store_form');
    }

    public function updateForm(int $id) 
    {
        $wing = UbsWing::find($id);

        return view('wings.update_form', compact('wing'));
    }

    public function store(UbsWingCreateRequest $request): RedirectResponse
    {
        $request->validated();

        $ubsWing = new UbsWing([
            'description' => $request->post('description', ''),
        ]);
        $ubsWing->save();

        return redirect()->route('wings.index');
    }

    public function delete($id): RedirectResponse
    {
        $ubsWing = UbsWing::where('id', $id)->firstOrFail();
        $ubsWing->delete();

        return redirect()->route('wings.index');
    }

    public function update($id, UbsWingUpdateRequest $request): RedirectResponse
    {
        $request->validated();

        $ubsWing = UbsWing::where('id', $id)->firstOrFail();
        $ubsWing->description = $request->description ? $request->description : $ubsWing->description;
        $ubsWing->save();

        return redirect()->route('wings.index');
    }
}
