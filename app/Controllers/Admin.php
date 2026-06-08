<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use IonAuth\Libraries\IonAuth;
use stdClass;
use Config\Config;
use App\Models\Game;
use Config\MyConfig;

class Admin extends BaseController

{
    protected $ionAuth;
    protected $config;
    var $game;
    var $dashPager;
    var $configu;

    public function __construct()
    {
        $this->ionAuth = new IonAuth();
        $this->config = new Config();
        $this->game = new Game();
        $configu = new MyConfig;
        $this->dashPager = $configu->dashPager;
    }

    public function index()
    {
        $game = $this->game->paginate($this->dashPager);
        $data['game'] = $game;
        $data['pager'] = $this->game->pager;
        return view('Login/dashboard', $data);
    }

    public function login()
    {
        $login = $this->request->getPost("email");
        $password = $this->request->getPost("password");
        $logged = $this->ionAuth->login($login, $password);
        $alertObject = new stdClass();
        if($logged) {
            $alertObject->text = $this->config->errorMessage['loginSuccess'];
            $alertObject->type = 'success';
            return redirect()->to('dashboard')->with('alert', $alertObject);
        } else {
            $alertObject->text = $this->config->errorMessage['loginDanger'];
            $alertObject->type = 'danger';
            return redirect()->to("login")->with('alert', $alertObject);
        }
    }

    
}
