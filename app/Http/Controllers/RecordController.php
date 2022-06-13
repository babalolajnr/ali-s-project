<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;
use App\Models\LGA;
use App\Models\Record;
use App\Models\State;
use App\Models\UnitPrice;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::pluck('principal_id')->unique()->map(function ($principalId) {
            $individualPrincipalRecords = Record::wherePrincipalId($principalId)->get();

            $individualRecords = $individualPrincipalRecords->map(function ($record) {
                $record->amount = $record->no_of_pillars * $record->unitPrice->price;
                $record->surcon =  ($record->amount / $record->unitPrice->price) * 400;
                $record->nat_nis = ($record->amount / $record->unitPrice->price) * 200;
                $record->ssce = ($record->amount / $record->unitPrice->price) * 200;
                $record->stnis = ($record->amount / $record->unitPrice->price) * 100;
                return $record;
            });

            $individualPrincipalRecords->principal_name = $individualRecords->first()->principal->name;
            $individualPrincipalRecords->status = $individualRecords->first()->principal->status->name;
            $individualPrincipalRecords->amount = $individualRecords->sum('amount');
            $individualPrincipalRecords->surcon = $individualRecords->sum('surcon');
            $individualPrincipalRecords->nat_nis = $individualRecords->sum('nat_nis');
            $individualPrincipalRecords->ssce = $individualRecords->sum('ssce');
            $individualPrincipalRecords->stnis = $individualRecords->sum('stnis');
            $individualPrincipalRecords->no_of_pillars = $individualRecords->sum('no_of_pillars');
            $individualPrincipalRecords->quarter = $individualRecords->first()->quarter->name;

            return $individualPrincipalRecords;
        });

        $state = State::whereName('Kwara')->first();
        $lgas = LGA::whereStateId($state->id)->get();

        return view('records.index', compact(['records', 'lgas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        Record::create($request->validated());

        return redirect()->back()->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecordRequest  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordRequest $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
