<?php

namespace App\Http\Repositories;

class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findFirst($conditions)
    {
        return $this->model->where($conditions)->first();
    }

    public function findAll($conditions = [], $with = [])
    {
        return $this->model->where($conditions)->with($with)->get();
    }

    public function insert($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($attributes, $id)
    {
        return $this->findById($id)->update($attributes);
    }

    public function deleteById($id): bool
    {
        $result = $this->findById($id);
        if ($result) {
            return $this->model->destroy($id);
        }
        return false;
    }

    public function deleteFirst($conditions): bool
    {
        $result = $this->findFirst($conditions);
        if ($result) {
            return $this->model->destroy($result->id);
        }
        return false;
    }

    public function deleteMany($conditions)
    {
        $count = 0;
        $results = $this->findAll($conditions);
        if (sizeof($results) > 0) {
            foreach ($results as $result) {
                if ($result) {
                    $this->model->destory($result->id);
                    ++$count;
                }
            }
        }

        return $count;
    }
}
