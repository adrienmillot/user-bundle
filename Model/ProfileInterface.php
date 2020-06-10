<?php

namespace amillot\UserBundle\Model;

interface ProfileInterface
{
    /**
     * @return string|null
     */
    public function getFirstName(): ?string;

    /**
     * @return string|null
     */
    public function getLastName(): ?string;

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface;

    /**
     * @param string|null $prmFirstName
     *
     * @return ProfileInterface
     */
    public function setFirstName(?string $prmFirstName): ProfileInterface;

    /**
     * @param string|null $prmLastName
     *
     * @return ProfileInterface
     */
    public function setLastName(?string $prmLastName): ProfileInterface;

    /**
     * @param UserInterface $prmUser
     *
     * @return ProfileInterface
     */
    public function setUser(UserInterface$prmUser): ProfileInterface;
}
