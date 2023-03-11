<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Models\Episode;
use App\Repositories\EpisodesRepository;
use Illuminate\Support\Facades\DB;

class EloquentEpisodesRepository implements EpisodesRepository
{
    public function all(array $data)
    {
        try {
            DB::beginTransaction();
            $episodes = Episode::where('season_id', $data['season_id'])->get();
            DB::commit();
        } catch (\Throwable $th) {
            return false;
        }
        return $episodes;
    }

    public function store(array $data)
    {
    }

    public function update($model, array $data)
    {
    }

    public function delete($model)
    {
    }
}