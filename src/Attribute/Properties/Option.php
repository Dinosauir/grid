<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute\Properties;

use Xpv\Grid\Attribute\Traits\IsJsonSerializable;
use JsonSerializable;

class Option implements JsonSerializable
{
    use IsJsonSerializable;

    public function __construct(private string|int $key, private string|int $value)
    {
    }
}
