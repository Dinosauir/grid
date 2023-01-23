<?php

namespace Abacus\Grid\Attribute;

use Abacus\Grid\Attribute\Traits\IsMakeable;

class BooleanAttribute extends Attribute
{
    use IsMakeable;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'boolean', $label);
    }
}
