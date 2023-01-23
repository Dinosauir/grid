<?php

declare(strict_types=1);

namespace Abacus\Grid\Filter\Traits;

trait HasLabel
{
    protected string|null $label = null;

    final public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    final public function getLabel(): string
    {
        if ($this->label) {
            return trans('filter'.$this->label);
        }

        return trans('filter.'.$this->label) ?? trans('filter.no_label');
    }
}
