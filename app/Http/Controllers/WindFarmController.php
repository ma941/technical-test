<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWindFarmRequest;
use App\Http\Requests\UpdateWindFarmRequest;
use App\Models\WindFarm;
use Inertia\Inertia;

class WindFarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Windfarm/Index', [
            'windFarms' => WindFarm::all(),
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
     * @param  \App\Http\Requests\StoreWindFarmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWindFarmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WindFarm  $windFarm
     * @return \Illuminate\Http\Response
     */
    public function show(WindFarm $windfarm)
    {
        return Inertia::render('Windfarm/Show', [
            'windFarm' => $windfarm->load('turbines'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WindFarm  $windFarm
     * @return \Illuminate\Http\Response
     */
    public function edit(WindFarm $windFarm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWindFarmRequest  $request
     * @param  \App\Models\WindFarm  $windFarm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWindFarmRequest $request, WindFarm $windFarm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WindFarm  $windFarm
     * @return \Illuminate\Http\Response
     */
    public function destroy(WindFarm $windFarm)
    {
        //
    }
}
