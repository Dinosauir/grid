<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute;

use Xpv\Grid\Attribute\Traits\IsMakeable;

class CalendarAttribute extends Attribute
{
    use IsMakeable;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'date', $label);
    }
}
