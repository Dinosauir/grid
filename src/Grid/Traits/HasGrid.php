<?php

declare(strict_types=1);

namespace Abacus\Grid\Grid\Traits;

use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

trait HasGrid
{
    final public function toGridFormat(): JsonSerializable
    {
        assert($this instanceof Model);

        $this->makeHidden(['created_at', 'updated_at', 'locale']);

        /** @var Model $model */
        $model = clone $this;

        if (!(method_exists($this, 'translation'))) {
            return $this;
        }

        if ($this->translation()) {
            foreach ($this->translation()->getAttributes() as $attribute => $value) {
                if ($this->checkGridAttribute($attribute)) {
                    continue;
                }

                $model->$attribute = $value;
            }
        }

        return $model;
    }

    private function checkGridAttribute(string $attribute): bool
    {
        return in_array($attribute, ['id', 'locale', 'created_at', 'updated_at']) || str_ends_with($attribute, '_id');
    }
}
