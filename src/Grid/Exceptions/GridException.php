<?php

namespace Abacus\Grid\Grid\Exceptions;

use Abacus\Grid\Shared\Exceptions\DomainRuleException;
use Illuminate\Database\Eloquent\Model;

class GridException extends DomainRuleException
{
    public static function notGridable(Model $model): static
    {
        return static::create()
            ->setDomainMessage("Model {" . $model::class . "} is not gridable!");
    }
}
