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
    var $search;
    var $searchPager;

    public function __construct() {
        $this->game = new Game();
        $this->developer = new Developer();
        $config = new MyConfig;
        $this->strankovani = $config->strankovani;
        $this->search = "";
        $this->searchPager = $config->searchPager;
    }

    public function index(): string
    {
        $data["game"] = $this->game->join("developer", "developer.id_developer = game.developer_id")->orderBy("id_game", "asc")->paginate($this->strankovani);
        $data["pager"] = $this->game->pager;
        return view('Game/index.php', $data);
    }

    public function search() {
        $request = service('request');
		$searchData = $this->request->getGet(); // OR $this->request->getGet();

		
		if (isset($searchData) && isset($searchData['search'])) {
			$search = $searchData['search'];
		}

        if ($search == '') {
			$paginateData = $this->game->paginate($this->searchPager);
		} else {
			$paginateData = $this->game->select('*')
				->orLike('name', $search)
				->orLike('email', $search)    			
				->paginate($this->searchPager);
        } 
        
        $data = [
			'game' => $paginateData,
			'pager' => $this->game->pager,
			'search' => $this->search
		];

        return view('Game/search-result.php', $data);

    }

    public function game($id) {
        $data["game"] = $this->game->join("developer", "developer.id_developer = game.developer_id")->join("publisher", "publisher.id_publisher = game.publisher_id")->where("id_game", $id)->find($id);
        return view('Game/game.php', $data); //!!!! Přejmenovala jsem si proměnou name z tabulky publisher na name_publisher
    }

    public function test($id1, $id2) {
        $data["game"] = $this->game->join("developer", "developer.id_developer = game.developer_id")->join("publisher", "publisher.id_publisher = game.publisher_id")->whereIn("id_game", [$id1, $id2])->findAll();
        return view('Game/two-games.php', $data);
    }

    public function choose() {
        $data["game"] = $this->game->orderBy("name", "asc")->findAll();
        return view('Game/choose.php', $data);
    }
}
