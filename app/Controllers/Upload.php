<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Upload extends BaseController
{
    public function uploadFile($file, $path, $name)
    {
        $extension = $file->getClientExtension();
        $nazev = "-".$name.time().".".$extension; // podle "-" zjistíme, jestli tam má odkaz nebo je u nás obrázek uložený
        $result = $file->move($path, $nazev);
        $return ["uploaded"] = $result;
        $return ["name"] = $nazev;
        return $return;
    }
}
