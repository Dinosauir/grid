<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute;

use Xpv\Grid\Attribute\Traits\IsMakeable;
use Xpv\Grid\Attribute\Traits\IsOptionable;
use Xpv\Grid\Attribute\Traits\IsRoutable;

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
