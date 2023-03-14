<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute;

use Xpv\Grid\Attribute\Traits\IsEditable;
use Xpv\Grid\Attribute\Traits\IsJsonSerializable;
use Xpv\Grid\Attribute\Traits\isLinkable;
use Xpv\Grid\Attribute\Traits\IsTranslated;
use JsonSerializable;

abstract class Attribute implements JsonSerializable
{
    use isLinkable;
    use IsEditable;
    use IsTranslated;
    use IsJsonSerializable;

    protected string $key;
    protected string $label;
    protected string $component;

    public function __construct(string $key, string $component, string $label)
    {
        $this->key = $key;
        $this->component = $component;
        $this->label = $label;
    }
}
