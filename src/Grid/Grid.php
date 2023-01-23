<?php

declare(strict_types=1);

namespace Abacus\Grid\Grid;

use Abacus\Grid\Attribute\Attribute;
use Abacus\Grid\Filter\AbstractFilter;
use Abacus\Grid\Grid\Exceptions\GridException;
use Abacus\Grid\Grid\Resources\GridResource;
use Abacus\Grid\Grid\Traits\HasColumns;
use Abacus\Grid\Grid\Traits\HasFilters;
use Illuminate\Pagination\LengthAwarePaginator;

class Grid extends AbstractGrid
{
    use HasColumns;
    use HasFilters;

    /**
     * @throws GridException
     */
    final public function paginate(int $per_page = 20): static
    {
        $this->applyFilters();

        $this->setPaginator($this->toGridFormat($this->getBuilder()->paginate($per_page)));

        return $this;
    }

    /**
     * @throws GridException
     */
    final public function get(): GridResource
    {
        $editableColumns = $this->columns->filter(function (Attribute $attribute) {
            return $attribute->isEditable();
        });

        if ($editableColumns->count() > 0) {
            $this->isEditable();
        }

        if (!$this->getPaginator()) {
            $this->paginate();
        }

        return (new GridResource($this->getPaginator()))->additional([
            'grid' => $this->columns,
            'filters' => $this->filters,
            'isEditable' => $this->isEditable,
        ]);
    }

    /**
     * @throws GridException
     */
    private function toGridFormat(LengthAwarePaginator $paginator): LengthAwarePaginator
    {
        if ($paginator->first() === null) {
            return $paginator;
        }

        $this->validatePaginator($paginator);

        return tap($paginator, static function ($paginatedInstance) {
            return $paginatedInstance->getCollection()->transform(function ($value) {
                return $value->toGridFormat();
            });
        });
    }

    private function applyFilters(): void
    {
        if (!$this->filters) {
            return;
        }

        /** @var AbstractFilter $filter */
        foreach ($this->filters as $filter) {
            $this->setBuilder($filter->apply($this->getBuilder()));
        }
    }
}
