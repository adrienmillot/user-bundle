<?php

declare(strict_types=1);

namespace amillot\UserBundle\ArgumentResolver;

use amillot\UserBundle\Model\ProfileInterface;

class ProfileValueResolver extends AbstractArgumentValueResolver
{
    const DEFAULT_CLASS_NAME = ProfileInterface::class;
}
