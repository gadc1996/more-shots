<?php

namespace App\Repositories;


interface CrudRepositoryInterface
{
    public function index();

    public function store(array $data);

    public function update(array $data, $id);

    public function destroy($id);

    public function show($id);
}
