<?php

declare(strict_types=1);

namespace Abacus\Grid\Filter;

use Abacus\Grid\Filter\Traits\HasAttributes;
use Abacus\Grid\Filter\Traits\HasColSpan;
use Abacus\Grid\Filter\Traits\HasKey;
use Abacus\Grid\Filter\Traits\HasQuery;
use JsonSerializable;

abstract class AbstractFilter implements JsonSerializable
{
    use HasKey;
    use HasColSpan;
    use HasQuery;
    use HasAttributes;

    public static function make(string $key): static
    {
        return (app(static::class))->setKey($key);
    }

    public function jsonSerialize()
    {
        $props = collect(get_object_vars($this));

        return $props->except('modifyQueryUsing')->toArray();
    }
}
