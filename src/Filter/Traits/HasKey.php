<?php

declare(strict_types=1);

namespace Abacus\Grid\Filter\Traits;

trait HasKey
{
    protected string $key;

    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }
}
