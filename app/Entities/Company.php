<?php

namespace App\Entities;

class Company
{

    /**
     * Company name
     * 
     * @var string
     */
    public string $name;

    /**
     * Company nick to show in website
     * 
     * @var string
     */
    public string $nick;

    /**
     * Company email
     * 
     * @var string
     */
    public string $email;


    /**
     * Company alias
     * 
     * @var string
     */
    public string $alias;

    /**
     * Company name
     * 
     * @var bool
     */
    public bool $active;


    /**
     * Construct of Company Entity
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->nick = $data['nick'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->alias = $data['alias'] ?? null;
        $this->active = $data['active'] ?? false;
    }

}