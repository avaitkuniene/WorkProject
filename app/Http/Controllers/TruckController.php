<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trucks\StoreTruckRequest;
use Illuminate\Http\Request;
use App\Models\Truck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class TruckController extends Controller
{
    public function create(): View|RedirectResponse
    {        
        return view('trucks/create');
    }

    public function store(StoreTruckRequest $request) {
        
        $request->validated();

        Truck::create($request->all());

        return redirect('trucks')
            ->with('success', 'Truck created successfully!');
    }

    public function index(): View
    {
        $trucks = Truck::all();

        return view('trucks/index', [
            'trucks' => $trucks
        ]);
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $truck = Truck::find($id); 

        if ($truck === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {

            $request->validate(
                [
                    'unit_number' => 'required',
                    'year' => 'required'            
                ]
            );

            $truck->fill($request->all());

            $truck->save();

            return redirect('trucks')->with('success', 'Truck updated!');
        }

        return view('trucks/edit', [
            'truck' => $truck
        ]);
    }

    public function delete(int $id)
    {
        $truck = Truck::find($id);

        if ($truck === null) {
            abort(404);
        }

        $truck->delete();

        return redirect('trucks')->with('success', 'Truck was removed!');
    }

    public function show(int $id): View
    {
        $truck = Truck::find($id);

        if ($truck === null) {
            abort(404);
        }

        return view('trucks/show', [
            'truck' => $truck
        ]);
    }
}
