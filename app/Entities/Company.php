<?php

namespace App\Entities;

class Company
{

    /**
     * Company name
     * 
     * @var string
     */
    private string $name;

    /**
     * Company nick to show in website
     * 
     * @var string
     */
    private string $nick;

    /**
     * Company email
     * 
     * @var string
     */
    private string $email;


    /**
     * Company alias
     * 
     * @var string
     */
    private string $alias;

    /**
     * Company name
     * 
     * @var bool
     */
    private bool $active;


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