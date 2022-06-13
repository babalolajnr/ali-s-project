<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitPriceRequest;
use App\Http\Requests\UpdateUnitPriceRequest;
use App\Models\UnitPrice;

class UnitPriceController extends Controller
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
     * @param  \App\Http\Requests\StoreUnitPriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitPriceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPrice  $unitPrice
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPrice $unitPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPrice  $unitPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPrice $unitPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitPriceRequest  $request
     * @param  \App\Models\UnitPrice  $unitPrice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitPriceRequest $request, UnitPrice $unitPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPrice  $unitPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPrice $unitPrice)
    {
        //
    }
}
