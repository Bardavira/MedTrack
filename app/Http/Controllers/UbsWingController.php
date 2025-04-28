<?php

namespace App\Http\Controllers;

use App\Http\Requests\UbsWingCreateRequest;
use App\Http\Requests\UbsWingUpdateRequest;
use App\Models\UbsWing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UbsWingController extends Controller
{
    public function index()
    {
        dump(UbsWing::all());
    }

    public function store(UbsWingCreateRequest $request): RedirectResponse
    {
        $request->validated();
        $ubsWing = new UbsWing([
            'description' => $request->post('description', ''),
        ]);
        $ubsWing->save();

        return redirect('/wings');
    }

    public function delete($id): RedirectResponse
    {
        $ubsWing = UbsWing::where('id', $id)->firstOrFail();
        $ubsWing->delete();
        return redirect('/wings');
    }

    public function update($id, UbsWingUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $ubsWing = UbsWing::where('id', $id)->firstOrFail();
        $ubsWing->description = $request->description ? $request->description : $ubsWing->description;
        $ubsWing->save();
        return redirect('/wings');
    }
    
}
