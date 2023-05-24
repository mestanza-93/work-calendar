<?php

namespace App\Entities;

class User 
{
    /**
     * User email
     * 
     * @var string
     */
    public string $email;

    /**
     * User name
     * 
     * @var string
     */
    public string $name;

    /**
     * User nick to show in website
     * 
     * @var string
     */
    public string $nick;

    /**
     * User password encrypted
     * 
     * @var string
     */
    public string $password;

    /**
     * User role
     * 
     * @var string
     */
    public string $role;

    /**
     * User active or not
     * 
     * @var bool
     */
    public bool $active;


    /**
     * Construct of User Entity
     */
    public function __construct(array $data)
    {
        $this->email = $data['email'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->nick = $data['nick'] ?? null;
        $this->password = $data['password'] ?? null;
        $this->role = $data['role'] ?? null;
        $this->active = $data['active'] ?? false;
    }

}