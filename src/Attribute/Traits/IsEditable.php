<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute\Traits;

trait IsEditable
{
    protected bool $editable = false;

    public function editable(): static
    {
        $this->editable = true;

        return $this;
    }

    public function isEditable(): bool
    {
        return $this->editable === true;
    }
}
