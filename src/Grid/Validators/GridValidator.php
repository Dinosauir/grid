<?php

namespace Xpv\Grid\Grid\Validators;

use Xpv\Grid\Grid\Contracts\GridableInterface;
use Xpv\Grid\Grid\Exceptions\GridException;
use Illuminate\Pagination\LengthAwarePaginator;

class GridValidator
{
    /**
     * @throws GridException
     */
    public static function validatePaginator(LengthAwarePaginator $paginator): void
    {
        if (!$paginator->first() instanceof GridableInterface) {
            throw GridException::notGridable($paginator->first());
        }
    }
}
