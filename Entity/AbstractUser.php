<?php

namespace amillot\UserBundle\Entity;

use amillot\UserBundle\Model\ProfileInterface;
use amillot\UserBundle\Model\UserInterface;

abstract class AbstractUser implements UserInterface
{
    protected $id;

    protected $password;

    protected $profile;

    protected $roles = [];

    protected $salt;

    protected $username;

    public function __construct()
    {
        $this->id = uniqid('user', true);
        $this->salt = base_convert(hash('sha512', uniqid((string)mt_rand(), true)), 16, 36);
    }

    public function __toString()
    {
        if (null !== $this->getProfile()) {
            return sprintf('%s', $this->getProfile());
        }

        return sprintf('%s', $this->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritDoc}
     */
    public function getProfile(): ?ProfileInterface
    {
        return $this->profile;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles()
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(string $prmPassword): UserInterface
    {
        $this->password = $prmPassword;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setProfile(?ProfileInterface $prmProfile): UserInterface
    {
        $this->profile = $prmProfile;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setRoles(array $prmRoles): UserInterface
    {
        $this->roles = $prmRoles;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername(string $prmUsername): UserInterface
    {
        $this->username = $prmUsername;

        return $this;
    }
}
