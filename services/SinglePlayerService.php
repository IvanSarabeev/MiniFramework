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
        $this->renderWinner();

        $_SESSION['gameBoard'] = serialize($this);
    }

    public function getBoard(): array
    {
        return $this->board;
    }

    public function reset(): void
    {
        unset($_SESSION['gameBoard']);
    }

    public function renderWinner(): void
    {
        if ($this->checkGameResult()) {
            echo "<h2 class='d-flex align-items-center justify-content-center mb-3'>The winner is
                        <strong class='pl-2 fs-3 d-flex align-items-center justify-content-center'>{$this->checkGameResult()}</strong>
                    </h2>";
        } else {
            echo "<p class='text-center fs-4 fw-medium'>The game is still running</p>";
        }
    }

}
