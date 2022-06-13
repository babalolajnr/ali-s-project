<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Models\Principal;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $principals = Principal::all();

        return view('principals.index', compact('principals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('principals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrincipalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrincipalRequest $request)
    {
        $principal = Principal::create($request->validated());

        return redirect()->back()->with('success', 'Principal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function show(Principal $principal)
    {
        return view('principals.show', compact('principal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function edit(Principal $principal)
    {
        return view('principals.edit', compact('principal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrincipalRequest  $request
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        $principal->update($request->validated());

        return redirect()->route('principals.show', $principal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Principal $principal)
    {
        try {
            $principal->delete();
        } catch (\Exception $e) {
            return redirect()->route('principals.show', $principal)
                ->with('error', 'Could not delete principal. It is being used by a user.');
        }
    }
}
