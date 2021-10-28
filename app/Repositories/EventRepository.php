<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Event;

class EventRepository implements EventRepositoryInterface
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function index()
    {
        return $this->model->paginate();
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

