<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute\Traits;

trait IsTranslated
{
    protected bool $is_translated = false;

    final public function translated(): self
    {
        $this->is_translated = true;

        return $this;
    }
}
