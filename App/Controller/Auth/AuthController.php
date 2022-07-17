<?php

namespace App\Controller\Auth;

use System\Controller;


class AuthController extends Controller
{
    public function __construct()
    {
        // enviar los datos de la sesion, y los parametros de la url para validar
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function logout()
    {
        $this->sessionDestroy('user');
        return $this->redirect('/');
    }

    //formulario olvide mi password
    public function forgotPassword()
    {
        return view('auth/forgotPassword');
    }

    //restablecer contraseña
    public function resetPassword()
    {
        return view('auth/resetPassword');
    }

    //confirmacion de cuenta mensage
    public function confirmMessage()
    {
        return view('auth/confirmMessage');
    }

    //confirmacion de cuenta
    public function confirmAccount()
    {
        return view('auth/confirmAccount', []);
    }
}
