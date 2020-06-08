<?php

namespace amillot\UserBundle\Entity;

use amillot\UserBundle\Model\ProfileInterface;
use amillot\UserBundle\Model\UserInterface;

abstract class AbstractProfile implements ProfileInterface
{
    protected $bornAt;

    protected $firstName;

    protected $id;

    protected $lastName;

    protected $user;

    public function __construct()
    {
        $this->id = uniqid('profile', true);
    }

    public function __toString()
    {
        return sprintf('%s %s', ucfirst($this->getFirstName()), strtoupper($this->getLastName()));
    }

    /**
     * {@inheritDoc}
     */
    public function getBornAt(): ?\DateTime
    {
        return $this->bornAt;
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * {@inheritDoc}
     */
    public function setBornAt(?\DateTime $prmBornAt): ProfileInterface
    {
        $this->bornAt = $prmBornAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName(?string $prmFirstName): ProfileInterface
    {
        $this->firstName = $prmFirstName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName(?string $prmLastName): ProfileInterface
    {
        $this->lastName = $prmLastName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(UserInterface$prmUser): ProfileInterface
    {
        $this->user = $prmUser;
        return $this;
    }
}
