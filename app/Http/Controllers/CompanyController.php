<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;

class CompanyController extends Controller
{
    public function all()
    {
        $companyModel = new CompanyModel();
        $companies = $companyModel->getAll();

        return view('companies', [
            'navbar' => [
                // 'home' => [
                //     'name' => 'home',
                //     'route' => ''
                // ],
                'companies' => [
                    'name' => 'Empresas',
                    'route' => 'companies'
                ],
                'employees' => [
                    'name' => 'Empleados',
                    'route' => 'employees'
                ],
                'calendar' => [
                    'name' => 'Calendario',
                    'route' => 'calendar'
                ]
            ],
            'companies' => $companies,
        ]);
    }

    public function getByAlias (string $alias)
    {
        $companyModel = new CompanyModel();
        $company = $companyModel->getByAlias($alias);

        return view('company', [
            'company' => $company
        ]);
    }
}
