<?php

declare(strict_types=1);

namespace Abacus\Grid\Grid\Traits;

use Abacus\Grid\Filter\AbstractFilter;
use Illuminate\Support\Collection;

trait HasFilters
{
    private ?Collection $filters = null;

    final public function addFilter(AbstractFilter $filter): void
    {
        if (!$this->filters) {
            $this->filters = collect([]);
        }

        $this->filters->push($filter);
    }
}
