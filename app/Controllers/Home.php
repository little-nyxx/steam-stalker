<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Game;
use App\Models\Developer;
use Config\MyConfig;

class Home extends BaseController
{
    var $game;
    var $developer;
    var $strankovani;
    var $config;

    public function __construct() {
        $this->game = new Game();
        $this->developer = new Developer();
        $config = new MyConfig;
        $this->strankovani = $config->strankovani;
    }

    public function index(): string
    {
        //$data["game"] = $this->game->orderBy("id_game", "asc")->findAll(9);
        
        // $adresniMista = $this->obec->select("obec.nazev, Count(*) as pocetMist")->where("okres", $kod)->join("cast_obce", "cast_obce.obec = obec.kod", "inner")->paginate($strankovani);
        //$developerIds = $this->game->select('developer_id')->distinct()->findColumn('developer_id');
        //$data["developer"] = $this->developer->select($data["game"]->developer_id, "id_developer")->findAll();
        //$data["developer"] = $this->developer->join('game', 'game.developer_id = developer.id_developer')->findAll();
        //$data["game"] = $this->game->join("developer", "developer.id_developer = game.developer_id")->orderBy("id_game", "asc")->findAll(9);
        
        $data["game"] = $this->game->join("developer", "developer.id_developer = game.developer_id")->orderBy("id_game", "asc")->paginate($this->strankovani);
        $data["pager"] = $this->game->pager;
        return view('Game/index.php', $data);
    }
}
