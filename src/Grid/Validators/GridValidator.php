<?php

namespace Abacus\Grid\Grid\Validators;

use Abacus\Grid\Grid\Contracts\GridableInterface;
use Abacus\Grid\Grid\Exceptions\GridException;
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
