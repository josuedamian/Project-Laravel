<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentSaveRequest;
use App\Http\Requests\InstrumentUpdateRequest;
use App\Http\Resources\InstrumentResource;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Instrument::where('state', 'ACTIVE')->get();
        return InstrumentResource::collection( $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstrumentSaveRequest $request)
    {
        $instrument = Instrument::create($request->all());

        return new InstrumentResource($instrument);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument)
    {
        return new InstrumentResource($instrument);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(InstrumentUpdateRequest $request, Instrument $instrument)
    {
        $instrument->update($request->all());

        return new InstrumentResource($instrument);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        if($instrument) $instrument->update(['state' => 'DELETE']);

        return response()->noContent();
    }
}
