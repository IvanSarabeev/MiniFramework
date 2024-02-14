<?php

namespace app\services;

class GameServices
{
    protected $player;
    protected $board;

    public function __construct()
    {
        $this->board = array_fill(0,3,array_fill(0,3,null));
        $this->player = "X";
    }

    protected function setBoard()
    {
        return $this->board && $this->player;
    }

}