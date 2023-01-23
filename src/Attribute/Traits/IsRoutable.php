<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute\Traits;

trait IsRoutable
{
    protected ?string $route = null;

    final public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }
}
