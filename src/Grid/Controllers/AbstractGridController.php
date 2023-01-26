<?php

namespace Abacus\Grid\Grid\Controllers;

use Abacus\Grid\Grid\Resources\GridResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

abstract class AbstractGridController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(protected Builder $builder)
    {
    }

    public function edit(string $ids): Model|Collection
    {
        $ids = explode(',', $ids);

        if (count($ids) === 1) {
            return $this->builder->findOrFail($ids[0])->toGridFormat();
        }

        return $this->builder->whereIn('id', $ids)->get()->map(function ($t) {
            return $t->toGridFormat();
        });
    }

    abstract public function index(): GridResource;
}
