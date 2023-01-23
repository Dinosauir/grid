<?php

declare(strict_types=1);

namespace Abacus\Grid\Filter\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasQuery
{
    use HasParams;

    protected array|null $modifyQueryUsing = null;

    /**
     * @throws \ReflectionException
     */
    final public function addQuery(string $key, \Closure $callback): static
    {
        $reflectionClosure = new \ReflectionFunction($callback);

        if ($reflectionClosure->getReturnType()?->getName() !== Builder::class) {
            return $this;
        }

        $this->modifyQueryUsing[$key] = $callback;

        return $this;
    }

    final public function apply(Builder $builder): Builder
    {

        if (is_iterable($this->modifyQueryUsing) && $this->modifyQueryUsing > 0) {
            foreach ($this->modifyQueryUsing as $key => $callback) {
                if ($value = request()->$key) {
                    $builder = $callback($builder, $value);
                }
            }
        }

        return $builder;
    }
}
