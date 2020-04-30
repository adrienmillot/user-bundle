<?php

namespace amillot\UserBundle\EntityListener;

use amillot\UserBundle\Model\UserInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserEntityListener
{
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $prmUserPasswordEncoder)
    {
        $this->userPasswordEncoder = $prmUserPasswordEncoder;
    }

    public function prePersist(LifecycleEventArgs $prmEvent)
    {
        $entity     = $prmEvent->getEntity();

        if (!$entity instanceof UserInterface) {
            return;
        }

        $password = $this->userPasswordEncoder->encodePassword($entity, $entity->getPassword());

        $entity->setPassword($password);
    }
}
