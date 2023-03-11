<?php

namespace App\Http\Controllers;

use App\Repositories\EpisodesRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function __construct(private EpisodesRepository $repository) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $series, int $season)
    {
        $episodes = $this->repository->all([
            'season_id' => $season,
        ]);

        $props = [
            'data' => [
                'episodes' => $episodes,
            ],
        ];

        return view('episodes.index')
            ->with('props', $props);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
