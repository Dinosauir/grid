<?php

declare(strict_types=1);

namespace Xpv\Grid\Grid;

use Xpv\Grid\Attribute\Attribute;
use Xpv\Grid\Filter\AbstractFilter;
use Xpv\Grid\Grid\Resources\GridResource;
use Xpv\Grid\Grid\Traits\HasBuilder;
use Xpv\Grid\Grid\Traits\HasPaginator;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractGrid
{
    use HasPaginator;
    use HasBuilder;

    public function __construct(Builder $builder)
    {
        $this->setBuilder($builder);
    }


    abstract public function add(Attribute $attribute): void;

    abstract public function editable(): void;

    abstract public function addFilter(AbstractFilter $filter): void;

    abstract public function actions(): void;

    abstract public function get(): GridResource;
}
