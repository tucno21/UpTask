<?php

namespace App\Controller\PanelAdmin;

use System\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        //ejecutar para proteger la rutas cuando inicia sesion
        //enviar la sesion y el parametro principal de la url
        $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function index()
    {
        $user = $this->sessionGet('user');

        return view('PanelAdmin/index', [
            'user' => $user->nombre,
        ]);
    }

    public function create()
    {
        $result = $this->request()->isPost();
        if ($result) {
            //
        }
        //return view('frontend/home', [
        //   'var' => 'es una variable',
        //]);
    }

    public function edit()
    {
        $result = $this->request()->isPost();
        if ($result) {
            //
        }
        //return view('frontend/home', [
        //   'var' => 'es una variable',
        //]);
    }

    public function destroy()
    {
    }
}
