<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Game;

class Item extends BaseController
{
    var $game;
    var $upload;

    public function __construct() {
        $this->game = new Game();
        $this->upload = new Upload();
    }

    public function add() {
        echo view("Item/add.php");
    }

    function create() {
        $name = $this->request->getPost("name");
        $release = strtotime($this->request->getPost("release"));
        $age = 0;
        $price = 0;
        $description = $this->request->getPost("text");
        $photo = $this->request->getFile("photo");
        $website = "meow";
        $email = "meow";
        $windows = $this->request->getPost("windowsSwitch") ? 1 : 0;
        $mac = $this->request->getPost("macSwitch") ? 1 : 0;
        $linux = $this->request->getPost("linuxSwitch") ? 1 : 0;
        $achievements = 0;
        $developer = 0;
        $publisher = 0; #idčka


        $path = "img/main/";
        $image = $this->upload->uploadFile($photo, $path, $photo->getName());

        $data = array(
            'name' => $name,
            'release_date' => $release,
            'required_age' => $age,
            'price' => $price,
            'description' => $description,
            'photo' => $image["name"],
            'website' => $website,
            'email' => $email,
            'windows' => $windows,
            'mac' => $mac,
            'linux' => $linux,
            'achievements' => $achievements,
            'developer' => $developer,
            'publisher' => $publisher,
        );
        
        $this->game->save($data);


    }

    public function index()
    {
        //
    }
}
