<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var CompanyRepository
     */
    protected $companyRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param CompanyRepository $companyRepository
     */
    public function __construct(UserRepository $userRepository, CompanyRepository $companyRepository)
    {
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
    }

    public function register()
    {
        return view('register');

    }

    public function login()
    {
        if (!empty(session('authenticated'))) {
            $companies = $this->companyRepository->getAll();
    
            return view('companies', [
                'navbar' => [
                    'title' => __('messages.companies.text'),
                ],
                'companies' => $companies,
            ]);
        } else {
            return view('login', [
                'messages' => []
            ]);
        }
    }


    public function checkLogin (Request $request)
    {
        $messages = [];

        /** Validate fields with custom names */
        Validator::make(
            $request->all(), 
            [ 
                'email' => 'required',
                'password' => 'required'
            ],
            [],
            [
                'email' => __('messages.email.text'),
                'password' => __('messages.password.text')
            ]
        )->validate();

        /** Check email from database */
        $params = $request->input() ?? null;
        $login = $this->userRepository->login($params);

        if (empty($login)) {
            $messages = [
                'email' => __('messages.email.not-exists')
            ];
        } else {

            /** Check password encrypted matchs */
            $checkPassword = Hash::check($params['password'], $login->password);

            if ($checkPassword === false && $login->active === true) {
                $messages = [
                    'password' => __('messages.password.wrong')
                ];

            /** Create session variables */
            } else {
                session()->put('authenticated', time());
                session()->put('user', $login);

                if ($login->role == 'admin') {
                    return redirect('/companies');
                } else {
                    return redirect('/');
                }
            }
        }

        return view('login', [
            'messages' => $messages
        ]);
    }


    /**
     * Remove user session
     */
    public function logout (Request $request)
    {
        session()->flush();
    }

}
