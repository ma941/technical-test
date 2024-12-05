<?php

namespace App\Http\Controllers;

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

}
