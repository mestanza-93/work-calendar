<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function home()
    {
        return view('login', [
            
        ]);

    }

    public function register()
    {
        return view('register');

    }

    public function login()
    {
        return view('login');
    }


    public function checkLogin (Request $request)
    {
        $errors = [];

        /** Check email from database */
        $params = $request->input() ?? null;
        $login = $this->userRepository->login($params);
        
        /** Check password encrypted */
        $passwordEncrypted = Hash::make($params['password']);
        $checkPassword = Hash::check($params['password'], $passwordEncrypted);

        if (empty($login)) {
            $errors = [
                'email' => __('messages.email.not-exists')
            ];
        } else if ($checkPassword === true) {
            $errors = [
                'password' => __('messages.password.wrong')
            ];
        }

        return view('login', [
            'errors' => $errors
        ]);
    }

}
