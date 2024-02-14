<?php

namespace app\controllers;
use app\services\SinglePlayerService;

class SinglePlayerContr
{
    private $singlePlayerService;

    public function __construct()
    {
        $this->singlePlayerService = SinglePlayerService::class;
    }

    public function getPlayerService()
    {

    }
}