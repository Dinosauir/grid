<?php

declare(strict_types=1);

namespace Xpv\Grid\Grid\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasBuilder
{
    private Builder $builder;

    final protected function getBuilder(): Builder
    {
        return $this->builder;
    }

    final protected function setBuilder(Builder $builder): void
    {
        $this->builder = $builder;
    }
}
