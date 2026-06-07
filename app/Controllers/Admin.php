<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        return view('Admin/dashboard');
    }

    public function login()
    {
         $login = $this->request->getPost("login");
        $password = $this->request->getPost("password");
        $logged = $this->ionAuth->login($login, $password);
        $alertObject = new stdClass();
        if($logged) {
            $alertObject->text = $this->config->errorMessage['loginSuccess'];
            $alertObject->type = 'success';
            return redirect()->to('Login/dashboard')->with('alert', $alertObject);
        } else {
            $alertObject->text = $this->config->errorMessage['loginDanger'];
            $alertObject->type = 'danger';
            return redirect()->to("Login/login")->with('alert', $alertObject);
        }
    }
}
