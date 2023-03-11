<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function all(array $data)
    {   
        try {
            DB::beginTransaction();
            $series = Series::query()->orderBy('name')->get();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        
        return $series;
    }

    public function store(array $data) {
        try {
            DB::beginTransaction();
            $series = Series::create($data);

            $seasons = [];
            for ($i = 1; $i <= $data['seasons']; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($i = 1; $i <= $data['episodes']; $i++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i,
                    ];
                }
            }
            Episode::insert($episodes);
            DB::commit();
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        
        return true;
    }

    public function update($series, array $data) {
        try {
            DB::beginTransaction();
            $series->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }

    public function delete($model) {
        try {
            DB::beginTransaction();
            $model->delete();
            DB::commit();
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }
}