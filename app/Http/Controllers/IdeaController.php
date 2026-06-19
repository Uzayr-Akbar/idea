<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeasRequest;
use App\Http\Requests\UpdateIdeasRequest;
use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->enum('status', IdeaStatus::class);
        
        $ideas = Auth::user()
                    ->ideas()
                    ->when($status, fn($query, $status)=>$query->where('status' , $status->value))
                    ->get();

        $statusCount = Idea::statusCounts(Auth::user());

        $isFiltered = isset($status);
        
        return view("idea.index", [
            "ideas" => $ideas,
            "statusCount" => $statusCount,
            "isFiltered" => $isFiltered
        ]);
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
    public function show(Idea $idea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeasRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea) {}
}