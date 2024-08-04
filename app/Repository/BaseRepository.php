<?php

namespace App\Repository;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    use FileUploadTrait;

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function lists($page = 10)
    {
        return $this->model->orderByDesc('id')->paginate($page);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        if ($record) {
            $record->update($data);
            return $record;
        }
        return null;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        if ($record) {
            $record->delete();
            return true;
        }
        return false;
    }

    public function search($query, array $columns = ['*'])
    {
        return $this->model->where(function ($q) use ($query, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', "%$query%");
            }
        })->get();
    }
}
