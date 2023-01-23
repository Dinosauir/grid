<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute;

use Abacus\Grid\Attribute\Traits\IsMakeable;
use Abacus\Grid\Attribute\Traits\IsOptionable;
use Abacus\Grid\Attribute\Traits\IsRoutable;

class SelectAttribute extends Attribute
{
    use IsMakeable;
    use IsOptionable;
    use IsRoutable;

    public function __construct(string $key, string $label)
    {
        parent::__construct($key, 'select', $label);
    }
}
