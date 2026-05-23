<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Game;
use App\Models\Developer;

class Home extends BaseController
{
    var $game;
    var $developer;

    public function __construct() {
        $this->game = new Game();
        $this->developer = new Developer();
    }

    public function index(): string
    {
        //$data["game"] = $this->game->orderBy("id_game", "asc")->findAll(9);
        
        // $adresniMista = $this->obec->select("obec.nazev, Count(*) as pocetMist")->where("okres", $kod)->join("cast_obce", "cast_obce.obec = obec.kod", "inner")->paginate($strankovani);
        //$developerIds = $this->game->select('developer_id')->distinct()->findColumn('developer_id');
        //$data["developer"] = $this->developer->select($data["game"]->developer_id, "id_developer")->findAll();
        //$data["developer"] = $this->developer->join('game', 'game.developer_id = developer.id_developer')->findAll();
        $data["game"] = $this->game->join("developer", "developer.id_developer = game.developer_id")->orderBy("id_game", "asc")->findAll(9);
        return view('Game/index.php', $data);
    }
}
