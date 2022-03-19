<?php

namespace App\Http\Infrastructure\Repository;

class Repository implements RepositoryInterface
{

    protected $model;

    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database and return bool val
    public function update(array $data, $id)
    {
        return $this->model->whereId($id)->update($data);
    }

    // update record and return updated record
    public function updateAndReturnRecord(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return tap($record)->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
}
