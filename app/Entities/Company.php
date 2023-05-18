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
        $this->name = $data['name'];
        $this->nick = $data['nick'];
        $this->email = $data['email'];
        $this->alias = $data['alias'];
        $this->active = $data['active'];
    }

}