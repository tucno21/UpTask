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
    }

    public function register()
    {
    }

    public function logout()
    {
        $this->sessionDestroy('user');
        return $this->redirect('/');
    }
}
