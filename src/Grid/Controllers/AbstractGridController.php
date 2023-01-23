<?php

namespace Abacus\Grid\Grid\Controllers;

use Abacus\Grid\Grid\Resources\GridResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

abstract class AbstractGridController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(private Builder $builder)
    {
    }

    abstract public function index(): GridResource;

    abstract public function edit(string $ids): Model|Collection;
}
