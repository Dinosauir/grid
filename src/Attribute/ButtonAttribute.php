<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute;

use Xpv\Grid\Attribute\Traits\IsMakeable;

class ButtonAttribute extends Attribute
{
    use IsMakeable;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'button', $label);
    }
}
