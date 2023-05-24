<?php

namespace App\Models;

use QueryBuilder;
use App\Entities\Company;

class CompanyModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * Query builder connection
     * 
     * @var QueryBuilder
     */
    protected $queryBuilder;

    public function __construct ()
    {
        $this->queryBuilder = new QueryBuilder($this->table);
    }


    /**
     * Get all users
     * 
     * @return array users
     */
    public function getAll (): array
    {
        $users = [];
        $data = $this->queryBuilder->getAll();

        if (!empty($data)) {
            foreach ($data as $item) {
                $companies[] = new User($item);
            }
        }

        return $users;
    }


    /**
     * Get User by ID
     * 
     * @param string $id
     * 
     * @return User|null user
     */
    public function getById (string $id): User|null
    {
        $user = null;
        $item = $this->queryBuilder->getById([$id]);

        if (!empty($item[0])) {
            $user = new User($item[0]);
        }
        return $user;
    }
    
}
