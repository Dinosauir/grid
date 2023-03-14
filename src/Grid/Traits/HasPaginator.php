<?php

declare(strict_types=1);

namespace Xpv\Grid\Grid\Traits;

use Xpv\Grid\Grid\Exceptions\GridException;
use Xpv\Grid\Grid\Validators\GridValidator;
use Illuminate\Pagination\LengthAwarePaginator;

trait HasPaginator
{
    private ?LengthAwarePaginator $paginator = null;

    final protected function getPaginator(): ?LengthAwarePaginator
    {
        return $this->paginator;
    }

    final protected function setPaginator(LengthAwarePaginator $paginator): void
    {
        $this->paginator = $paginator;
    }

    /**
     * @throws GridException
     */
    final protected function validatePaginator(LengthAwarePaginator $paginator): void
    {
        GridValidator::validatePaginator($paginator);
    }

    abstract public function paginate(int $per_page): static;
}
