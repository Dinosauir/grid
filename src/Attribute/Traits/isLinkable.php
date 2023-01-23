<?php

declare(strict_types=1);

namespace Abacus\Grid\Attribute\Traits;

use Abacus\Grid\Attribute\Enums\LinkActionEnum;

trait isLinkable
{
    protected string $actionAsLink;
    protected ?string $link = null;

    final public function linkable(LinkActionEnum $action, string $url = null): self
    {
        $this->setAction($action->value);

        if ($action === LinkActionEnum::CUSTOM) {
            $this->link = $url;
        }

        return $this;
    }

    private function setAction(string $action): void
    {
        $methodName = $this->resolveAction($action);

        if (is_callable([$this, $methodName])) {
            $this->{$methodName}();
        }
    }

    private function resolveAction(string $action): string
    {
        return 'set' . ucfirst($action) . 'Action';
    }

    private function setEditAction(): void
    {
        $this->actionAsLink = LinkActionEnum::EDIT->value;
    }

    private function setViewAction(): void
    {
        $this->actionAsLink = LinkActionEnum::VIEW->value;
    }

    private function setCustomAction(): void
    {
        $this->actionAsLink = LinkActionEnum::CUSTOM->value;
    }
}
