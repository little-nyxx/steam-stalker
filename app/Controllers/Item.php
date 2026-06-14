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
use App\Models\LanguageSound;
use App\Models\LanguageText;
use App\Models\GameTag;
use App\Models\GameGenre;
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
    var $game_language_sound;
    var $game_language_text;
    var $game_tag;
    var $game_genre;

    public function __construct() {
        $this->game = new Game();
        $this->upload = new Upload();
        $this->developer = new Developer();
        $this->publisher = new Publisher();
        $this->genre = new Genre();
        $this->tag = new Tag();
        $this->language = new Language();
        $this->game_language_sound = new LanguageSound();
        $this->game_language_text = new LanguageText();
        $this->game_tag = new GameTag();
        $this->game_genre = new GameGenre();
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
        $release = $this->request->getPost("release");
        $age = $this->request->getPost("age") ?? 0;
        $price = $this->request->getPost("price") ?? 0;
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

        $path = "img/main/";
        $image = $this->upload->uploadFile($photo, $path, $photo->getName());

        $language_sound = $this->request->getPost("language_id_sound[]");
        //echo($language_sound); //nefunguje ale duallistbox, takže toto nic nedělá
        if (is_array($language_sound)) {
            $language_sound_str = implode(',', $language_sound);
            echo($language_sound_str);
        } else {
            $language_sound_str = $language_sound;
            echo($language_sound_str);
        }

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

        //echo($this->request->getPost("language_id_sound"));

        //echo ($gameId = $this->game->insertID());

        //return redirect()->to('dashboard')->with("success", "Game added"); //toto nakonec odkomentovat
    }

     public function update($id_game) {
        $game = $this->game->find($id_game);
        if ($game == null) {
            return redirect()->to('dashboard')->with('error', 'Game not found');
        }

        $name = $this->request->getPost("name");
        $release = $this->request->getPost("release");
        $age = $this->request->getPost("age") ?? 0;
        $price = $this->request->getPost("price") ?? 0;
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

        $data = array(
            'name' => $name,
            'release_date' => $release,
            'required_age' => $age,
            'price' => $price,
            'description' => $description,
            'website' => $website,
            'email' => $email,
            'windows' => $windows,
            'mac' => $mac,
            'linux' => $linux,
            'achievements' => $achievements,
            'developer_id' => $developer,
            'publisher_id' => $publisher,
        );

        //var_dump($photo);

        if ($photo != "") {
            $path = "img/main/";
            $image = $this->upload->uploadFile($photo, $path, $photo->getName());
            $meow = FCPATH.$path;
            if (file_exists($meow.$game->photo)) {
                unlink($meow.$game->photo);
            }
            //unlink($meow.$game->photo);
            $data["photo"] = $image["name"];
            echo($meow.$game->photo);
        }

        $this->game->update($id_game, $data);

        $this->game_language_sound->where('game_id_game', $id_game)->delete();
        $language_sound_selected = $this->request->getPost('duallistbox_lang_sound[]');
        $ids = is_array($language_sound_selected) ? array_map('intval', $language_sound_selected) : [];

        $data_sound = [];
        foreach ($language_sound_selected as $langId) {
            if ($langId > 0) {
                $data_sound[] = [
                    'game_id_game'     => (int)$id_game,
                    'language_id_language' => (int)$langId,
                ];
            }
        }

        if (!empty($data_sound)) {
            $this->game_language_sound->insertBatch($data_sound);
        }



        $this->game_language_text->where('game_id_game', $id_game)->delete();
        $language_text_selected = $this->request->getPost('duallistbox_lang_text[]');
        $ids = is_array($language_text_selected) ? array_map('intval', $language_text_selected) : [];

        $data_text = [];
        foreach ($language_text_selected as $langId) {
            if ($langId > 0) {
                $data_text[] = [
                    'game_id_game'     => (int)$id_game,
                    'language_id_language' => (int)$langId,
                ];
            }
        }

        if (!empty($data_text)) {
            $this->game_language_text->insertBatch($data_text);
        }


        $this->game_genre->where('game_id_game', $id_game)->delete();
        $genre_selected = $this->request->getPost('duallistbox_genres[]');
        $ids = is_array($genre_selected) ? array_map('intval', $genre_selected) : [];

        $data_genre = [];
        foreach ($genre_selected as $genreId) {
            if ($genreId > 0) {
                $data_genre[] = [
                    'game_id_game'     => (int)$id_game,
                    'genre_id_genre' => (int)$genreId,
                ];
            }
        }

        if (!empty($data_genre)) {
            $this->game_genre->insertBatch($data_genre);
        }


        $this->game_tag->where('game_id_game', $id_game)->delete();
        $tag_selected = $this->request->getPost('duallistbox_tags[]');
        $ids = is_array($tag_selected) ? array_map('intval', $tag_selected) : [];

        $data_tag = [];
        foreach ($tag_selected as $tagId) {
            if ($tagId > 0) {
                $data_tag[] = [
                    'game_id_game'     => (int)$id_game,
                    'tag_id_tag' => (int)$tagId,
                ];
            }
        }

        if (!empty($data_tag)) {
            $this->game_tag->insertBatch($data_tag);
        }

    


        //return redirect()->route('dashboard')->with("success", "Game updated");
    }


    public function delete($id_game) {
        $game_del = $this->game->find($id_game);
        if ($game_del == null) {
            return redirect()->to('/dashboard')->with('error', 'Game not found');
        }

        $this->game->update($id_game, ['deleted_at' => date('Y-m-d H:i:s')]);

        return redirect()->to('/dashboard')->with('success', 'Game moved to trash (soft deleted)');

        //$result = $this->game->delete($id_game); //toto nefacha prosim o pomoc, nevim co s tim nechce to najit objekt jsem zoufala
        //return redirect()->route('dashboard');
    }

    public function edit($id_game) {
        $data["game"] = $this->game->find($id_game);
        $data['developer'] = $this->developer->findAll();
        $data['publisher'] = $this->publisher->findAll();
        $data['genre'] = $this->genre->findAll();
        $data['tag'] = $this->tag->findAll();
        $data['language'] = $this->language->findAll();
        $data['game_language_sound'] = $this->game_language_sound->where('game_id_game', $id_game)->findAll();
        $data['game_language_text'] = $this->game_language_text->where('game_id_game', $id_game)->findAll();
        $data['game_tag'] = $this->game_tag->where('game_id_game', $id_game)->findAll();
        $data['game_genre'] = $this->game_genre->where('game_id_game', $id_game)->findAll();

        echo view('item/edit', $data);
    }

    public function index()
    {
        //
    }
}
