<?php

declare(strict_types=1);

namespace Abacus\Grid\Shared\Exceptions;

use Abacus\Grid\Shared\Exceptions\Traits\HasDomainMessage;
use Countable;
use Exception;
use Throwable;

class DomainRuleException extends Exception implements \Abacus\Grid\Shared\Contracts\DomainRuleException
{
    use HasDomainMessage;

    public static function withDomainMessage(
        string $key,
        array $replace = [],
        Countable|int|array $number = null,
        string $message = '',
        Throwable $previous = null
    ): static {
        return static::create($message, 0, $previous)
            ->setDomainMessage($key, $replace, $number);
    }

    public static function withPluralizedDomainMessage(
        string $key,
        Countable|int|array $number,
        array $replace = [],
        string $message = '',
        Throwable $previous = null
    ): static {
        return static::create($message, 0, $previous)
            ->setDomainPluralizedMessage($key, $number, $replace);
    }

    public static function create(string $message = '', int $code = 0, Throwable $previous = null): static
    {
        return new static($message, $code, $previous);
    }
}
