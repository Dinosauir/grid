<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute\Traits;

trait IsMakeable
{
    public static function make(string $key, string $label): static
    {
        return new self($key, $label);
    }
}
