<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDamageAndWearRequest;
use App\Http\Requests\UpdateDamageAndWearRequest;
use App\Models\DamageAndWear;

class DamageAndWearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDamageAndWearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDamageAndWearRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DamageAndWear  $damageAndWear
     * @return \Illuminate\Http\Response
     */
    public function show(DamageAndWear $damageAndWear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DamageAndWear  $damageAndWear
     * @return \Illuminate\Http\Response
     */
    public function edit(DamageAndWear $damageAndWear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDamageAndWearRequest  $request
     * @param  \App\Models\DamageAndWear  $damageAndWear
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDamageAndWearRequest $request, DamageAndWear $damageAndWear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DamageAndWear  $damageAndWear
     * @return \Illuminate\Http\Response
     */
    public function destroy(DamageAndWear $damageAndWear)
    {
        //
    }
}
