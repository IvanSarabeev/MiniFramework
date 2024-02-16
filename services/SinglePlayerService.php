<?php

namespace app\services;

class SinglePlayerService extends GameServices
{
    public function __construct()
    {
        if (!empty($_SESSION['gameBoard'])) {
            $gameBoard = unserialize($_SESSION['gameBoard']);

            $this->board = $gameBoard->board;
            $this->player = $gameBoard->player;
        } else {
            $this->board = array_fill(0, 3, array_fill(0, 3, null));
            $this->player = "X";
        }
    }

    public function setPlayersMoves($row, $col): void
    {
        if ($this->board[$row][$col] == null) {
            $this->board[$row][$col]= $this->player;
            // switching player's roles
            $this->player = $this->player === "X" ? "O" : "X";
        }

        $this->checkGameResult();

        $_SESSION['gameBoard'] = serialize($this);
    }

    public function getBoard(): array
    {
        return $this->board;
    }

    public function reset()
    {
        unset($_SESSION['gameBoard']);
    }
}