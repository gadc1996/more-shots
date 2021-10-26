<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\EventType;

class EventTypeRepository implements EventTypeRepositoryInterface
{
    protected $model;

    public function __construct(EventType $event)
    {
        $this->model = $event;
    }

    public function index(): Collection
    {
        return $this->model->all();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}

