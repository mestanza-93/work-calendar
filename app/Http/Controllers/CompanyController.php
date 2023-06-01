<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    /**
     * @var CompanyRepository
     */
    protected $companyRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function all()
    {
        $companies = $this->companyRepository->getAll();

        return view('companies', [
            'navbar' => [
                'title' => __('messages.companies.text'),
                'sections' => [
                    'employees' => [
                        'name' => 'Empleados',
                        'route' => 'employees'
                    ],
                    'calendar' => [
                        'name' => 'Calendario',
                        'route' => 'calendar'
                    ],
                    'vacances' => [
                        'name' => 'Vacaciones',
                        'route' => 'vacances'
                    ]
                ],
            ],
            'companies' => $companies,
        ]);
    }

    public function getByAlias (string $alias)
    {
        $company = $this->companyRepository->getByAlias($alias);

        return view('company', [
            'company' => $company
        ]);
    }
}
