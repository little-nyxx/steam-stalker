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
}