<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneratorRequest;
use App\Http\Requests\UpdateGeneratorRequest;
use App\Models\Generator;
use App\Models\Turbine;
use Inertia\Inertia;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Generator/Index', [
            'generators' => Generator::with('damageAndWear', 'turbine.windFarm')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGeneratorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneratorRequest $request)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('blades')->first();
        $generator = Generator::create($request->validated());

        $turbine->generators->each(function (Generator $associatedGenerator) {
            $associatedGenerator->turbine()->dissociate();
            $associatedGenerator->save();
        });

        $generator->turbine()->associate($turbine);
        $generator->damageAndWear()->associate($request->validated('damageAndWear'));
        $generator->save();

        return Inertia::location(route('turbines.show', ['turbine' => $request->validated('turbine')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Generator  $generator
     * @return \Illuminate\Http\Response
     */
    public function show(Generator $generator)
    {
        return Inertia::render('Generator/Show', [
            'generator' => $generator->load('damageAndWear', 'turbine.windFarm'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneratorRequest  $request
     * @param  \App\Models\Generator  $generator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneratorRequest $request, Generator $generator)
    {
        $turbine = Turbine::where('id', $request->validated('turbine'))->with('blades')->first();

        if ($generator->turbine_id !== $request->validated('turbine')) {
            $turbine->generators->each(function (Generator $associatedGenerator) {
                $associatedGenerator->turbine()->dissociate();
                $associatedGenerator->save();
            });

            $generator->turbine()->associate($turbine);
        }

        $generator->damageAndWear()->associate($request->validated('damageAndWear'));
        $generator->save();

        return Inertia::location(route('turbines.show', ['turbine' => $turbine->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generator  $generator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generator $generator)
    {
        $generator->delete();
        return Inertia::location(route('generators.index'));
    }
}
