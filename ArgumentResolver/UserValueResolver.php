<?php

declare(strict_types=1);

namespace amillot\UserBundle\ArgumentResolver;

use amillot\UserBundle\Model\UserInterface;

class UserValueResolver extends AbstractArgumentValueResolver
{
    const DEFAULT_CLASS_NAME = UserInterface::class;
}
