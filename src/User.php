<?php

namespace Geekbrains\Cainwens;

class User
{
    private int $id;
    private string $firstname;
    private string $lastname;

    /**
     * Summary of __construct
     * @param int $id id пользователя
     * @param string $firstname Имя 
     * @param string $lastname Фамилия
     */
    public function __construct(int $id, string $firstname, string $lastname)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }


    public function __toString(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getId()
    {
        return $this->id;
    }
}