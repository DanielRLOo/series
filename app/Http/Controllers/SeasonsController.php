<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Repositories\SeasonsRepository;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function __construct(private SeasonsRepository $repository) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Series $series, Request $request)
    {
        $seasons = $this->repository->all(['series_id' => $series->id]);

        if (!$seasons) {
            $props = [
                'message' => [
                    'content' => 'There was a problem retrieving the seasons for this series. Please try again in a second.',
                    'type' => 'danger',
                ],
            ];

            return view('seasons.index')
                ->with('props', $props);
        }

        $props = [
            'data' => [
                'seasons' => $seasons,
                'series' => $series
            ],
            'table_caption' => $request->series_name,
        ];

        return view('seasons.index')
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
