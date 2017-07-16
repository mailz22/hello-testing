<?php

namespace Model;

class UserModel
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var array */
    private $roles = [];

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return UserModel
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserModel
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return UserModel
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}