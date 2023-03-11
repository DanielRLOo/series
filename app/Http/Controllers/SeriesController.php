<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository) {
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = $this->repository->all([]);

        if (!$series) {
            $props = session('props');
            $props['message'] = [
                'content' => 'There whas a problem while fetching data. Please try again.',
                'type' => 'danger',
            ];
        }

        $props = session('props');
        $props['data']['series'] = $series;

        return view('series.index')
            ->with('props', $props);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $props = [
            'title' => "Create Series",
            'action' => 'create',
        ];

        return view('series.create')
            ->with('props', $props);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesFormRequest $request)
    {
        $data = $request->all();
        
        if (!$this->repository->store($data)) {
            $props = [
                'message' => [
                    'content' => "An error occurred while creating '{$data['name']}' series.",
                    'type' => 'danger',
                ],
            ];

            return to_route('series.index')
                ->with('props', $props);
        }

        $props = [
            'message' => [
                'content' => "Series '{$data['name']}' successfully created.",
                'type' => 'success',
            ],
        ];

        return to_route('series.index')
            ->with('props', $props);
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        $props = [
            'title' => 'Edit Series',
            'action' => 'edit',
            'data' => [
                'series' => $series
            ],
        ];

        return view('series.edit')
            ->with('props', $props);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Series $series, SeriesFormRequest $request)
    {
        if (!$this->repository->update($series, $request->all())) {
            $props = [
                'message' => [
                    'content' => "Series '{$series->name}' could not be updated.",
                    'type' => 'danger',
                ],
            ];

            return to_route('series.index')
                ->with('props', $props);
        }

        $props = [
            'message' => [
                'content' => "Series '{$series->name}' successfully updated.",
                'type' =>'success',
            ],
        ];

        return to_route('series.index')
            ->with('props', $props);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        if (!$this->repository->delete($series)) {
            $props = [
                'message' => [
                    'content' => "Series '{$series->name}' could not be deleted.",
                    'type' => 'danger',
                ],
            ];

            return to_route('series.index')
                ->with('props', $props);
        }

        $props = [
            'message' => [
                'content' => "Series '{$series->name}' successfully deleted.",
                'type' => 'success',
            ],
        ];

        return to_route('series.index')
            ->with('props', $props);
    }
}