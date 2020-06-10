<?php

namespace amillot\UserBundle\EntityListener;

use amillot\UserBundle\Model\ProfileInterface;
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
        $profile = $entity->getProfile();

        $entity->setPassword($password);
        $profile->setUser($entity);
    }
}
