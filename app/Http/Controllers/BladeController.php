<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBladeRequest;
use App\Http\Requests\UpdateBladeRequest;
use App\Models\Blade;
use App\Models\Turbine;
use Inertia\Inertia;

class BladeController extends Controller
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
     * @param  \App\Http\Requests\StoreBladeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBladeRequest $request)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('blades')->first();
        $blade = Blade::create($request->validated());

        $turbine->blades->each(function (Blade $associatedBlade) {
            $associatedBlade->turbine()->dissociate();
            $associatedBlade->save();
        });

        $blade->turbine()->associate($turbine);
        $blade->damageAndWear()->associate($request->validated('damageAndWear'));
        $blade->save();

        return Inertia::location(route('turbines.show', ['turbine' => $request->validated('turbine')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blade  $blade
     * @return \Illuminate\Http\Response
     */
    public function show(Blade $blade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blade  $blade
     * @return \Illuminate\Http\Response
     */
    public function edit(Blade $blade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBladeRequest  $request
     * @param  \App\Models\Blade  $blade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBladeRequest $request, Blade $blade)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('blades')->first();

        if ($blade->turbine_id !== $request->validated('turbine')) {
            $turbine->blades->each(function (Blade $associatedBlade) {
                $associatedBlade->turbine()->dissociate();
                $associatedBlade->save();
            });

            $blade->turbine()->associate($turbine);
        }

        $blade->damageAndWear()->associate($request->validated('damageAndWear'));
        $blade->save();

        return Inertia::location(route('turbines.show', ['turbine' => $turbine->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blade  $blade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blade $blade)
    {
        //
    }
}
