<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Subunit;
use Illuminate\Http\Request;

class SubunitController extends Controller
{
    public function create(Request $request, int $id)
    {
        $truck = Truck::find($id); 
        $trucks = Truck::all();

        return view('subunits/create', [
            'truck' => $truck,
            'trucks' => $trucks
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate(
            [
                'main_truck' => 'required',
                'subunit' => 'required', 
                'start_date' => 'required',
                'end_date' => 'required'           
            ]
        );

        $subunit = Subunit::create($request->all());

        if ($subunit->main_truck === $subunit->subunit) {
            return back()->withErrors(['subunit' => 'Subunit cannot be the same truck']);
        }

        if ($subunit->start_date <= now() && $subunit->end_date >= now()) {
            return back()->withErrors(['subunit' => 'Subunit is already in use']);
        }

        return redirect('trucks')->with('success', 'Subunit added!');
    }
}