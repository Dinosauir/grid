<?php

declare(strict_types=1);

namespace Abacus\Grid\Shared\Contracts;

use Throwable;

interface DomainRuleException extends Throwable
{
    public function getDomainMessage(): ?array;
}
