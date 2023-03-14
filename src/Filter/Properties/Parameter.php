<?php

declare(strict_types=1);

namespace Xpv\Grid\Filter\Properties;

class Parameter
{
    public function __construct(private readonly string $name)
    {
    }

    public static function make(string $name): static
    {
        return new static($name);
    }

    final public function getName(): string
    {
        return $this->name;
    }
}
