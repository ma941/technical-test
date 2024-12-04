<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHubRequest;
use App\Http\Requests\UpdateHubRequest;
use App\Models\Hub;
use App\Models\Turbine;
use Inertia\Inertia;

class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Hub/Index', [
            'hubs' => Hub::with('damageAndWear', 'turbine.windFarm')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHubRequest $request)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('rotors')->first();
        
        $hub = Hub::create($request->validated());

        $turbine->hubs->each(function (Hub $associatedHubs) {
            $associatedHubs->turbine()->dissociate();
            $associatedHubs->save();
        });

        $hub->turbine()->associate($turbine);
        $hub->damageAndWear()->associate($request->validated('damageAndWear'));
        $hub->save();

        return Inertia::location(route('turbines.show', ['turbine' => $request->validated('turbine')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function show(Hub $hub)
    {
        return Inertia::render('Hub/Show', [
            'hub' => $hub->load('damageAndWear', 'turbine.windFarm'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHubRequest  $request
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHubRequest $request, Hub $hub)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('blades')->first();

        if ($hub->turbine_id !== $request->validated('turbine')) {
            $turbine->hubs->each(function (Hub $associatedHubs) {
                $associatedHubs->turbine()->dissociate();
                $associatedHubs->save();
            });

            $hub->turbine()->associate($turbine);
        }

        $hub->damageAndWear()->associate($request->validated('damageAndWear'));
        $hub->save();

        return Inertia::location(route('turbines.show', ['turbine' => $turbine->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hub $hub)
    {
        $hub->delete();
        return Inertia::location(route('hubs.index'));
    }
}
