<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\Language;
use App\Controllers\Upload;
use Config\Config;

class Item extends BaseController
{
    var $game;
    var $upload;
    var $developer;
    var $publisher;
    var $genre;
    var $tag;
    var $language;
    var $result;
    var $alertMessage;

    public function __construct() {
        $this->game = new Game();
        $this->upload = new Upload();
        $this->developer = new Developer();
        $this->publisher = new Publisher();
        $this->genre = new Genre();
        $this->tag = new Tag();
        $this->language = new Language();
    }


    public function add() {
        $data['developer'] = $this->developer->findAll();
        $data['publisher'] = $this->publisher->findAll();
        $data['genre'] = $this->genre->findAll();
        $data['tag'] = $this->tag->findAll();
        $data['language'] = $this->language->findAll();
        
        echo view("Item/add.php", $data);
    }

    function create() {
        $name = $this->request->getPost("name");
        $release = strtotime($this->request->getPost("release"));
        $age = $this->request->getPost("age");
        $price = $this->request->getPost("price");
        $description = $this->request->getPost("text");
        $photo = $this->request->getFile("photo");
        $website = $this->request->getPost("website");
        $email = $this->request->getPost("email");
        $windows = $this->request->getPost("windows") ? 1 : 0;
        $mac = $this->request->getPost("mac") ? 1 : 0;
        $linux = $this->request->getPost("linux") ? 1 : 0;
        $achievements = $this->request->getPost("achievements");
        $developer = $this->request->getPost("developer");
        $publisher = $this->request->getPost("publisher");

        //var_dump($developer);

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
            'developer_id' => $developer,
            'publisher_id' => $publisher,
        );
        
        $this->game->save($data);

        return redirect()->route('dashboard');
    }

     public function update() {
        $id = $this->request->getPost('id');
        //$link = $this->request->getPost('link');
        $name = $this->request->getPost('name');
        $photoname = $this->request->getFile('photo');
        //$cesta = "obrazky/sigma/";
        
        //$date = strtotime($this->request->getPost('date'));
        $windows = $this->request->getPost('windows') ? 1 : 0;
        $mac = $this->request->getPost('mac') ? 1 : 0;
        $linux = $this->request->getPost('linux') ? 1 : 0;
        $description = $this->request->getPost('text');
       // $published = $this->request->getPost('published');
        $data = array(
            'id' => $id,
            //'link' => $link,
            'name' => $name,
            //'date' => $date,
            'windows' => $windows,
            'mac' => $mac,
            'linux' => $linux,
            'description' => $description,
        );

        if($photoname != "") {
            $photo = $this->upload->uploadFile($photoname, $cesta, $photoname->getName());
            $data["photo"] = $photo["name"];
        }
 
        $this->game->save($data);
        //$data["link"] = "game/".$id."-".$link;

        $this->game->update($id, $data);

        return redirect()->route('dashboard');
    }


    public function delete($id_game) {
        $result = $this->game->update($id_game, ['isDeleted' => 1]); //toto nefacha prosim o pomoc, nevim co s tim nechce to najit objekt jsem zoufala
        return redirect()->route('dashboard');
    }

    public function edit($id_game) {
        $data["game"] = $this->game->find($id_game);
        

        echo view('item/edit', $data);
    }

    public function index()
    {
        //
    }
}
