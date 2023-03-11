<?php

namespace App\Repositories;

interface SeriesRepository 
{
    public function all(array $data);

    public function store(array $data);

    public function update($model, array $data);

    public function delete($model);

}