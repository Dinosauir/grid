<?php

namespace Xpv\Grid\Grid\Exceptions;

use Xpv\Grid\Shared\Exceptions\DomainRuleException;
use Illuminate\Database\Eloquent\Model;

class GridException extends DomainRuleException
{
    public static function notGridable(Model $model): static
    {
        return static::create()
            ->setDomainMessage("Model {" . $model::class . "} is not gridable!");
    }
}
