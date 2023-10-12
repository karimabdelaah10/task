<?php

namespace App\Modules\Country\Repositories;

use App\Modules\Country\Country;

class CountryRepository
{
    public function __construct(private $model = null)
    {
        if ($model instanceof Country) {
            $this->model = $model;
        } else {
            $this->model = new Country();
        }
    }

    public function list($pagination = false, $active = false)
    {
        return $this->model
            ->latest()
            ->filterable()
            ->when($active, function ($query) {
                return $query->active();
            })
            ->when($pagination, function ($quer) {
                return $quer->paginate(request()->per_page ?? env('DEFAULT_PER_PAGE'));
            }, function ($que) {
                return $que->get();
            });
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
