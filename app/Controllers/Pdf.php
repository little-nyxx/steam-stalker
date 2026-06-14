<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Game;

class Pdf extends BaseController
{
    public function generateGameListPdf(){
        $game = new Game();

        // Retrieve all games with related developer and publisher names.
        $games = $game->select('game.*, developer.name_developer, publisher.name_publisher')
            ->join('developer', 'developer.id_developer = game.developer_id')
            ->join('publisher', 'publisher.id_publisher = game.publisher_id')
            ->orderBy('id_game', 'asc')
            ->limit(100)
            ->findAll();
        $options = new Options();
        $options->set('isRemoteEnable',true);

        $dompdf = new Dompdf($options);

        $html = view('Game/game_list_pdf', ['game' => $games]);

        $dompdf->loadHtml($html);

        $dompdf->render();

        $filename = 'game_list_'.date('YmdHis').'.pdf';

        $dompdf->stream($filename,['Attachment'=>false]);
    }
}
