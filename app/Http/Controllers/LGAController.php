<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLGARequest;
use App\Http\Requests\UpdateLGARequest;
use App\Models\LGA;

class LGAController extends Controller
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
     * @param  \App\Http\Requests\StoreLGARequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLGARequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LGA  $lGA
     * @return \Illuminate\Http\Response
     */
    public function show(LGA $lGA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LGA  $lGA
     * @return \Illuminate\Http\Response
     */
    public function edit(LGA $lGA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLGARequest  $request
     * @param  \App\Models\LGA  $lGA
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLGARequest $request, LGA $lGA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LGA  $lGA
     * @return \Illuminate\Http\Response
     */
    public function destroy(LGA $lGA)
    {
        //
    }
}
