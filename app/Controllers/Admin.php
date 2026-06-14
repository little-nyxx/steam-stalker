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
        $identity = trim((string) $this->request->getPost('identity'));
        $password = (string) $this->request->getPost('password');
        $alertObject = new stdClass();

        $user = null;
        if ($identity !== '') {
            $user = db_connect()
                ->table('users')
                ->groupStart()
                ->where('email', $identity)
                ->orWhere('username', $identity)
                ->groupEnd()
                ->limit(1)
                ->get()
                ->getRow();
        }

        if ($user && password_verify($password, $user->password)) {
            if ((int) $user->active !== 1) {
                $alertObject->text = $this->config->errorMessage['loginDanger'];
                $alertObject->type = 'danger';
                return redirect()->to('login')->with('alert', $alertObject);
            }

            $this->ionAuth->setSession($user);
            $this->ionAuth->updateLastLogin($user->id);
            $this->ionAuth->clearLoginAttempts($identity);

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
