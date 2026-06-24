<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeasRequest;
use App\Http\Requests\UpdateIdeasRequest;
use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\IdeaPolicy;

#[UsePolicy(IdeaPolicy::class)]
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
            ->when($status, fn($query, $status) => $query->where('status', $status->value))
            ->get();

        $statusCount = Idea::statusCounts(Auth::user());

        $isFiltered = isset($status);

        return view('idea.index', [
            'ideas' => $ideas,
            'statusCount' => $statusCount,
            'isFiltered' => $isFiltered,
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
    public function store(StoreIdeasRequest $request): \Illuminate\Http\RedirectResponse
    {
        $idea = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Auth::user()->ideas()->create($idea);
        return redirect()->route('idea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('idea.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeasRequest $request, Idea $idea): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('idea.index');
    }
}
