<?php

namespace Geekbrains\Cainwens;

class User
{
    private UUID $uuid;
    private string $firstname;
    private string $lastname;
    private string $username;

    /**
     * Summary of __construct
     * @param UUID $uuid id пользователя
     * @param string $firstname Имя 
     * @param string $lastname Фамилия
     */
    public function __construct(UUID $uuid, string $username, string $firstname, string $lastname)
    {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }


    public function __toString(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function uuid(): UUID
    {
        return $this->uuid;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    public function fullName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }
}