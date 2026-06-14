<?php

namespace App\Models;

use CodeIgniter\Model;

class Game extends Model
{
    protected $table            = 'game';
    protected $primaryKey       = 'id_game';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["name", "release_date", "required_age", "price", "description", "photo", "website", "email", "windows", "mac", "linux", "achievements", "developer_id", "publisher_id"];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPriceAggregates() {
        return $this->select('COUNT(id_game) AS total_games, ROUND(AVG(price), 2) AS average_price, MIN(price) AS min_price, MAX(price) AS max_price, SUM(price) AS total_price')->where('price IS NOT NULL')->first();
    }

    public function getDeveloperPriceStats() {
        return $this->select('developer.name_developer AS developer_name, COUNT(game.id_game) AS game_count, ROUND(AVG(game.price), 2) AS average_price, MIN(game.price) AS min_price, MAX(game.price) AS max_price')->join('developer', 'developer.id_developer = game.developer_id')->groupBy('developer.id_developer, developer.name_developer')->orderBy('developer.name_developer', 'asc')->findAll();
    }
}
