<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Models\Season;
use App\Repositories\SeasonsRepository;
use Illuminate\Support\Facades\DB;

class EloquentSeasonsRepository implements SeasonsRepository
{
	public function all(array $data) {
        try {
            DB::beginTransaction();
            $seasons = Season::with('episodes')
                ->where('series_id', $data['series_id'])
                ->get();
            DB::commit();

        } catch (\Throwable $th) {
            return false;

        }
        return $seasons;
	}
	
	public function store(array $data) {
	}
	
	public function update($model, array $data) {
	}
	
	public function delete($model) {
	}
}