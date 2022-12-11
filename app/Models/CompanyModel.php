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
    protected $table = 'companies';


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
     * Get all companies
     * 
     * @return array companies
     */
    public function getAll (): array
    {
        $companies = [];
        $data = $this->queryBuilder->getAll();

        if (!empty($data)) {
            foreach ($data as $item) {
                $companies[] = new Company($item->data());
            }
        }

        return $companies;
    }


    /**
     * Get Company by alias
     * 
     * @param string $id
     * 
     * @return Company company
     */
    public function getByAlias (string $alias): Company
    {
        $item = $this->queryBuilder->getByField('alias', $alias);

        if (!empty($item)) {
            return new Company($item->data());
        }
    }
    
}
