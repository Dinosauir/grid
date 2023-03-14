<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute;

use Xpv\Grid\Attribute\Traits\IsMakeable;

class HiddenAttribute extends Attribute
{
    use IsMakeable;

    private mixed $value;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'hidden', $label);
    }

    final public function value(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }
}
