<?php

namespace app\services;

class SinglePlayerService extends GameServices
{

    protected function setPlayersMoves($row, $col)
    {
        if ($this->board[$row][$col] == null) {
            $this->board[$row][$col]= $this->player;
            $this->player = "X" ? "O" : "X";
        }
    }

}