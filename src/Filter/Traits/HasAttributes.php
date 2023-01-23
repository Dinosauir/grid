<?php

declare(strict_types=1);

namespace Abacus\Grid\Filter\Traits;

use Abacus\Grid\Attribute\Attribute;
use Illuminate\Support\Collection;

trait HasAttributes
{
    protected ?Collection $attributes = null;

    final public function addInput(Attribute $attribute): static
    {
        if (!$this->attributes) {
            $this->attributes = collect([]);
        }

        $this->attributes->push($attribute);

        return $this;
    }
}
