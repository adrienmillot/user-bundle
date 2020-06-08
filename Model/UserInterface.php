<?php

namespace amillot\UserBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

interface UserInterface extends SecurityUserInterface
{
    /**
     * @param string $prmPassword
     *
     * @return UserInterface
     */
    public function setPassword(string $prmPassword): UserInterface;

    /**
     * @param array $prmRoles
     *
     * @return UserInterface
     */
    public function setRoles(array $prmRoles): UserInterface;

    /**
     * @param string $prmUsername
     *
     * @return UserInterface
     */
    public function setUsername(string $prmUsername): UserInterface;
}
