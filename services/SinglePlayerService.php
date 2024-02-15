<?php

namespace app\services;

class SinglePlayerService extends GameServices
{
    public function __construct()
    {
        $this->board = array_fill(0, 3, array_fill(0, 3, null));
        $this->player = "X";
    }

    public function setPlayersMoves($row, $col): void
    {
        if ($this->board[$row][$col] == null) {
            $this->board[$row][$col]= $this->player;
            $this->player = "X" ? "O" : "X";
        }


    }

    /**
     * @return array
     */
    public function getBoard(): array
    {
        return $this->board;
    }

    /**
     * @return string
     */
    public function getPlayer(): string
    {
        return $this->player;
    }
}