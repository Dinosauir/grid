<?php

declare(strict_types=1);

namespace Abacus\Grid\Filter\Traits;

use Abacus\Grid\Filter\Properties\Parameter;
use Illuminate\Support\Collection;

trait HasParams
{
    protected ?Collection $params = null;

    final public function addParam(Parameter $param): static
    {
        if (!$this->params) {
            $this->params = collect([]);
        }

        $this->params->push($param->getName());

        return $this;
    }
}
