<?php

declare(strict_types=1);

namespace Abacus\Grid\Shared\Exceptions\Traits;

use Countable;

trait HasDomainMessage
{
    protected ?array $domainMessage = null;

    final public function setDomainMessage(string $key, array $replace = [], Countable|int|array $number = null): static
    {
        if (is_countable($number)) {
            $number = count($number);
        }

        $this->domainMessage = compact('key', 'replace', 'number');

        return $this;
    }

    final public function setDomainPluralizedMessage(
        string $key,
        Countable|int|array $number,
        array $replace = []
    ): static {
        return $this->setDomainMessage($key, $replace, $number);
    }

    final public function getDomainMessage(): ?array
    {
        return $this->domainMessage;
    }
}
