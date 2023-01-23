<?php

namespace Abacus\Grid\Attribute\Traits;

trait IsJsonSerializable
{
    public function jsonSerialize(): array
    {
        return collect(get_object_vars($this))->toArray();
    }
}
