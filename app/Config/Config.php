<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Config extends BaseConfig
{
    public $errorMessage = [
        'filterDanger' => 'Musíš se nejdřív přihlásit!',
        'loginDanger' => 'Heslo nebo login jsou špatné, zkus to znovu.',
        'loginSuccess' => 'Přihlášení proběhlo úspěšně!'
    ];

    public $alertMessage = array(
        'dbAddError' => 'Záznam se nepřidal',
        'dbEditError' => 'Záznam se neaktulizoval',
        'dbDelError' => 'Záznam se nesmazal',
        'dbAddSuccess' => 'Záznam byl přidán do databáze',
        'dbEditSuccess' => 'Záznam se aktualizoval',
        'dbDelSuccess' => 'Záznam byl smazán'
);
}