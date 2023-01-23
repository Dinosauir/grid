<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute\Traits;

trait IsEditable
{
    protected bool $editable = false;

    public function editable(): self
    {
        $this->editable = true;

        return $this;
    }

    public function isEditable(): bool
    {
        return $this->editable === true;
    }
}
