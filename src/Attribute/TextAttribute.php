<?php

namespace Xpv\Grid\Attribute;

use Xpv\Grid\Attribute\Traits\IsMakeable;

class TextAttribute extends Attribute
{
    use IsMakeable;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'text', $label);
    }
}
