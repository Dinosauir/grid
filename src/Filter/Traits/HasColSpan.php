<?php

declare(strict_types=1);

namespace Xpv\Grid\Filter\Traits;

trait HasColSpan
{
    protected int $columnSpan = 1;

    final public function setColumnSpan(int $span): static
    {
        $this->columnSpan = $span;

        return $this;
    }
}
