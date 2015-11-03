<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Guard as Auth;

class AuthController extends Controller
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function login()
    {
        return View('login');
    }

    public function authenticate(LoginRequest $request)
    {
        $data = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password'),
        ];

        if ($this->auth->attempt($data)) {
            return redirect()->intended('/');
        }

        return redirect('login')->withInput()->withErrors('Usuário ou senha inválidos');
    }
}
