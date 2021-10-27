<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CrudRepositoryInterface
{
    public function index();
    
    public function store(array $data);

    public function update(array $data, $id);

    public function destroy($id);

    public function show($id);
}
