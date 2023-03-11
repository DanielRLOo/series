<?php

namespace App\Repositories;

interface EpisodesRepository
{
    public function all(array $data);

    public function store(array $data);

    public function update($model, array $data);

    public function delete($model);

}