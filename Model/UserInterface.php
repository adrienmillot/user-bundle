<?php

namespace amillot\UserBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

interface UserInterface extends SecurityUserInterface
{
    /**
     * @return ProfileInterface|null
     */
    public function getProfile(): ?ProfileInterface;

    /**
     * @param string $prmPassword
     *
     * @return UserInterface
     */
    public function setPassword(string $prmPassword): UserInterface;

    /**
     * @param ProfileInterface|null $prmProfile
     *
     * @return UserInterface
     */
    public function setProfile(?ProfileInterface $prmProfile): UserInterface;

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
