<?php

namespace App\Controller\Auth;

use System\Controller;
use App\Model\AuthModel;
use App\Library\Email\Email;


class AuthController extends Controller
{
    public function __construct()
    {
        // enviar los datos de la sesion, y los parametros de la url para validar
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function login()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();


            $valid = $this->validate($data, [
                'email' => 'required|email|not_unique:AuthModel,email',
                'password' => 'required|password_verify:AuthModel,email',
            ]);

            if ($valid !== true) {
                return view('auth/login', [
                    'err' =>  (object)$valid,
                    'data' => (object)$data,
                ]);
            } else {
                $user = AuthModel::select('id, email, nombre, estado')->where('email', $data['email'])->get();

                if ($user->estado == 1) {
                    $this->sessionSet('user', $user);
                    return $this->redirect('dashboard');
                }

                $mensaje = ['email' => 'Aún no has autenticado tu cuenta, revisa tu correo o en la seccion de span'];
                return view('auth/login', [
                    'err' =>  (object)$mensaje,
                    'data' => (object)$data,
                ]);
            }
        }

        return view('auth/login');
    }

    public function register()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'nombre' => 'required|text',
                'email' => 'required|email|unique:AuthModel,email',
                'password' => 'required|min:5|max:12|matches:repassword',
                'repassword' => 'required',
            ]);

            if ($valid !== true) {

                return $this->view('auth/register', [
                    'err' =>  (object)$valid,
                    'data' => (object)$data,
                ]);
            } else {

                $data['token'] = uniqid();
                $data['estado'] = 0;

                AuthModel::create($data);

                $email = new Email($data['email'], $data['nombre'], $data['token']);
                $email->send();

                return $this->redirect('confirm-message');
            }
        }
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
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'email' => 'required|email|not_unique:AuthModel,email',
            ]);

            if ($valid !== true) {
                return view('auth/forgotPassword', [
                    'err' =>  (object)$valid,
                    'data' => (object)$data,
                ]);
            } else {
                $user = AuthModel::select('id, email, nombre, estado')->where('email', $data['email'])->get();

                $user->token = uniqid();
                $user->estado = 0;

                AuthModel::update($user->id, $user);

                $email = new Email($user->email, $user->nombre, $user->token);
                $email->send();

                return $this->redirect('reset-message');
            }
        }

        return view('auth/forgotPassword');
    }

    public function resetMessage()
    {
        return view('auth/resetMessage');
    }

    //restablecer contraseña
    public function resetPassword()
    {
        $result = $this->request()->isGet();
        if ($result) {
            $data = $this->request()->getInput();

            if (!$data['token']) {
                return $this->redirect('/');
            }

            $user = AuthModel::where('token', $data['token'])->first();

            if (empty($user)) {
                $alert = 'Token no valido, revisa tu email, para reestableces contraseña';
                return view('auth/resetPassword', [
                    'alert' => $alert,
                ]);
            }

            return view('auth/resetPassword', [
                'user' => $user,
            ]);
        }

        $result = $this->request()->isPost();
        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'password' => 'required|min:5|max:12|matches:repassword',
                'repassword' => 'required',
            ]);

            if ($valid !== true) {

                return $this->view('auth/resetPassword', [
                    'err' =>  (object)$valid,
                    'data' => (object)$data,
                ]);
            } else {
                $user = AuthModel::where('token', $data['token'])->first();

                //la contraseña ya viene $data y el modelo se encarga de codificar
                $data['token'] = '';
                $data['estado'] = 1;

                AuthModel::update($user->id, $data);

                return $this->redirect('/');
            }
        }


        return view('auth/resetPassword', []);
    }

    //confirmacion de cuenta mensage
    public function confirmMessage()
    {
        return view('auth/confirmMessage');
    }

    //confirmacion de cuenta
    public function confirmAccount()
    {
        $data = $this->request()->getInput();

        $user = AuthModel::where('token', $data['token'])->first();

        $alert = '';
        if (empty($user)) {
            $alert = 'token no valido';
        } else {
            $user->estado = '1';
            $user->token = '';

            AuthModel::update($user->id, $user);
        }

        return view('auth/confirmAccount', [
            'alert' => $alert,
        ]);
    }
}
