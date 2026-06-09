<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeasRequest;
use App\Http\Requests\UpdateIdeasRequest;
use App\Models\Ideas;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ideas $ideas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ideas $ideas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeasRequest $request, Ideas $ideas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ideas $ideas)
    {
        //
    }
}
