<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute;

use Illuminate\Support\Collection;

class ActionsAttribute extends Attribute
{
    public Collection $options;

    public function __construct()
    {
        parent::__construct('actions', 'actions', trans('grid.actions'));

        $this->options = collect([]);
        $this->options->push(
            ButtonAttribute::make('view', trans('button.view')),
            ButtonAttribute::make('delete', trans('button.delete')),
            ButtonAttribute::make('edit', trans('button.edit'))
        );
    }

    public static function make(): self
    {
        return new self();
    }

    final public function removeEdit(): self
    {
        $this->options->forget(2);

        return $this;
    }

    final public function removeDelete(): self
    {
        $this->options->forget(1);

        return $this;
    }

    final public function removeView(): self
    {
        $this->options->forget(0);

        return $this;
    }

    final public function addAction(Attribute $attribute): self
    {
        $this->options->push($attribute);

        return $this;
    }
}
