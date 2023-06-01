<?php
namespace App\Repositories;

use App\Models\CompanyModel;
use App\Entities\Company;

class CompanyRepository
{
    /**
     * @var CompanyModel
     */
    protected $model;

    public function __construct ()
    {
        $this->model = new CompanyModel();
    }

    public function getAll (): array|null
    {
        $companies = $this->model->getAll();
        return $companies ?? null;
    }

    public function getByAlias (string $alias = null): Company|null
    {
        $companies = $this->model->getByAlias($params['alias'] ?? null);
        return $companies ?? null;
    }
}