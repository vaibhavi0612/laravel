<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiHelper
{
    private $defaultRowsNumber = 10;

    public function paginateOrNot(Request $request, Builder $model): mixed
    {
        if ($request->exists('page')) {
            return $this->paginate($request, $model);
        }

        return $this->all($request, $model);
    }

    private function paginate(Request $request, Builder $model): LengthAwarePaginator
    {
        return $model->paginate($request->rows ?: $this->defaultRowsNumber);
    }

    private function all(Request $request, Builder $model): Collection
    {
        return $model->get();
    }
}
