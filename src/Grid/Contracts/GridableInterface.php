<?php

declare(strict_types=1);

namespace Xpv\Grid\Grid\Contracts;

use JsonSerializable;

interface GridableInterface
{
    public function toGridFormat(): JsonSerializable;
}
