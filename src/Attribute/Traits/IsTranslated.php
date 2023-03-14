<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute\Traits;

trait IsTranslated
{
    protected bool $is_translated = false;

    final public function translated(): static
    {
        $this->is_translated = true;

        return $this;
    }
}
