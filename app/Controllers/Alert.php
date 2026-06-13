<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Alert extends BaseController
{
    public function makeMessage($status, $type) {
        $result = new \stdClass();
        if($status) {
            $result->class = "success";
            $shortType = $type."success";
        } else {
            $result->class = "danger";
            $shortType = $type."danger";
        }
        $result->message = $this->config->errorMessage[$shortType];
        return $result;
    }
}
