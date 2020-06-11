<?php

declare(strict_types=1);

namespace amillot\UserBundle\ArgumentResolver;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

abstract class AbstractArgumentValueResolver implements ArgumentValueResolverInterface
{
    protected $repository;

    public function __construct(ManagerRegistry $prmRegistry)
    {
        $this->repository = $prmRegistry->getRepository(static::DEFAULT_CLASS_NAME);
    }

    /**
     * @inheritDoc
     */
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return static::DEFAULT_CLASS_NAME === $argument->getType();
    }

    /**
     * @inheritDoc
     */
    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield $this->repository->findOneById($request->get('id'));
    }
}
