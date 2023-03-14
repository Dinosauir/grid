<?php

declare(strict_types=1);

namespace Xpv\Grid\Attribute\Enums;

enum LinkActionEnum: string
{
    case EDIT = 'edit';
    case VIEW = 'view';
    case CUSTOM = 'custom';
}
