<?php
namespace App\Repositories;

use App\Models\UserModel;
use App\Entities\User;

class UserRepository
{
    /**
     * @var UserModel
     */
    protected $model;

    public function __construct ()
    {
        $this->model = new UserModel();
    }

    public function login (array $params = []): User|null
    {
        $login = $this->model->login($params);
        return $login ?? null;
    }
}