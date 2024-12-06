<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRotorRequest;
use App\Http\Requests\UpdateRotorRequest;
use App\Models\Rotor;
use App\Models\Turbine;
use Inertia\Inertia;

class RotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Rotor/Index', [
            'rotors' => Rotor::with('damageAndWear', 'turbine.windFarm')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRotorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRotorRequest $request)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('rotors')->first();
        
        $rotor = Rotor::create($request->validated());

        $turbine->rotors->each(function (Rotor $associatedRotors) {
            $associatedRotors->turbine()->dissociate();
            $associatedRotors->save();
        });

        $rotor->turbine()->associate($turbine);
        $rotor->damageAndWear()->associate($request->validated('damageAndWear'));
        $rotor->save();

        return Inertia::location(route('turbines.show', ['turbine' => $request->validated('turbine')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rotor  $rotor
     * @return \Illuminate\Http\Response
     */
    public function show(Rotor $rotor)
    {
        return Inertia::render('Rotor/Show', [
            'rotor' => $rotor->load('damageAndWear', 'turbine.windFarm'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRotorRequest  $request
     * @param  \App\Models\Rotor  $rotor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRotorRequest $request, Rotor $rotor)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('blades')->first();

        if ($rotor->turbine_id !== $request->validated('turbine')) {
            $turbine->rotors->each(function (Rotor $associatedRotors) {
                $associatedRotors->turbine()->dissociate();
                $associatedRotors->save();
            });

            $rotor->turbine()->associate($turbine);
        }

        $rotor->damageAndWear()->associate($request->validated('damageAndWear'));
        $rotor->save();

        return Inertia::location(route('turbines.show', ['turbine' => $turbine->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rotor  $rotor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rotor $rotor)
    {
        $rotor->delete();
        return Inertia::location(route('rotors.index'));
    }
}
