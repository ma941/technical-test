<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurbineRequest;
use App\Http\Requests\UpdateTurbineRequest;
use App\Models\Blade;
use App\Models\DamageAndWear;
use App\Models\Generator;
use App\Models\Hub;
use App\Models\Rotor;
use App\Models\Turbine;
use Inertia\Inertia;

class TurbineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Turbine/Index', [
            'turbines' => Turbine::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTurbineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTurbineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turbine  $turbine
     * @return \Illuminate\Http\Response
     */
    public function show(Turbine $turbine)
    {
        $availableBlades = Blade::whereNull('turbine_id')
                                ->orWhere('turbine_id', $turbine->id)
                                ->get();

        $availableRotors = Rotor::whereNull('turbine_id')
                                ->orWhere('turbine_id', $turbine->id)
                                ->get();

        $availableHubs = Hub::whereNull('turbine_id')
                                ->orWhere('turbine_id', $turbine->id)
                                ->get();

        $availableGenerators = Generator::whereNull('turbine_id')
                                ->orWhere('turbine_id', $turbine->id)
                                ->get();

        return Inertia::render('Turbine/Show', [
            'turbine' => $turbine->load('windFarm', 'blades.damageAndWear', 'rotors.damageAndWear', 'hubs.damageAndWear', 'generators.damageAndWear'),
            'unusedBlades' => $availableBlades,
            'unusedRotors' => $availableRotors,
            'unusedHubs' => $availableHubs,
            'unusedGenerators' => $availableGenerators,
            'damageAndWearOptions' => DamageAndWear::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turbine  $turbine
     * @return \Illuminate\Http\Response
     */
    public function edit(Turbine $turbine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTurbineRequest  $request
     * @param  \App\Models\Turbine  $turbine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTurbineRequest $request, Turbine $turbine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turbine  $turbine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turbine $turbine)
    {
        //
    }
}
