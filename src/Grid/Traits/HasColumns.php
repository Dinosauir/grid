<?php

declare(strict_types=1);

namespace Xpv\Grid\Grid\Traits;

use Xpv\Grid\Attribute\ActionsAttribute;
use Xpv\Grid\Attribute\Attribute;
use Illuminate\Support\Collection;

trait HasColumns
{
    private ?Collection $columns = null;
    private bool $isEditable = false;

    final public function add(Attribute $attribute): void
    {
        if (!$this->columns) {
            $this->columns = collect([]);
        }

        $this->columns->push($attribute);
    }

    final public function getColumns(): ?Collection
    {
        if (env('APP_DEBUG') === true) {
            return $this->columns;
        }

        return null;
    }

    final public function editable(): void
    {
        /** @var Attribute $attribute */
        foreach ($this->columns as $attribute) {
            $attribute->editable();
        }
    }

    final public function isEditable(): void
    {
        $this->isEditable = true;
    }

    final public function actions(): void
    {
        $this->columns->push(ActionsAttribute::make());
    }

    public function actionsWithoutView(): void
    {
        $this->columns->push(ActionsAttribute::make()->removeView());
    }

    public function deleteAction(): void
    {
        $this->columns->push((ActionsAttribute::make()->removeView()->removeEdit()));
    }
}
