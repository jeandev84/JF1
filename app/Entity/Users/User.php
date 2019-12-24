<?php
namespace App\Entity\Users;


/**
 * Class User
 * @package App\Entity\Users
*/
class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $role;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    /*
    public function setId($id)
    {
        $this->id = $id;
    }
    */

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
    */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return string
    */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
    */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
    */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
    */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
}