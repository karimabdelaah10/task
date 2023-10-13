<?php

namespace App\Modules\Transaction\Repositories;

use App\Modules\Transaction\Transaction;
use Closure;

class TransactionRepository
{
    public function __construct(private $model = null)
    {
        if ($model instanceof Transaction) {
            $this->model = $model;
        } else {
            $this->model = new Transaction();
        }
    }

    public function list(
        $pagination = false,
        $active = false,
        $searchKey = null,
        $countryId = null,
        Closure $callback = null,
    )
    {
        return $this->model
            ->query()
            ->latest('id')
//            ->filterable(
//                searchKey: $searchKey,
//                countryId: $countryId
//            )
            ->when($callback, $callback)
            ->orderBy('id', 'desc')
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

    public function updateOrCreate($data)
    {
        return $this->model->query()->updateOrCreate($data);

    }
}
