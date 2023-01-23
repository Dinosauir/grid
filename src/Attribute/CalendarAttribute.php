<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute;

use Abacus\Grid\Attribute\Traits\IsMakeable;

class CalendarAttribute extends Attribute
{
    use IsMakeable;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'date', $label);
    }
}
