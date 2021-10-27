<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    protected $model;

    private function getResourceById($id)
    {
        return $resource = $this->model->find($id);
    }

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function index()
    {
        return $this->model->paginate();
    }

    public function show($id)
    {
        $resource = $this->getResourceById($id);
        return $resource;
    }

    public function store($data)
    {
        $resource = $this->model->create($data);
        return $resource;
    }

    public function update(array $data, $id)
    {
        $resource = $this->getResourceById($id);
        $resource->update($data);
        return $resource;
    }

    public function destroy($id)
    {
        $resource = $this->getResourceById($id);
        $resource->destroy($resource->id);
        return $resource;
    }

}
