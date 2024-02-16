<?php

namespace app\services;

class MultiPlayerService extends GameServices
{

    public function __construct()
    {
        if (!empty($_SESSION['gameBot'])) {
            $gameBot = unserialize($_SESSION['gameBot']);

            $this->board = $gameBot->board;
            $this->player = $gameBot->player;
        } else {
            $this->board = array_fill(0, 3, array_fill(0, 3, null));
            $this->player = "X";
        }
    }

    public function getPlayerMove($row, $col): void
    {
        if ($this->board[$row][$col] == null) {
            $this->board[$row][$col] = $this->player;
        }
    }

    public function setBotMoves(): void
    {
        $emptyCells = [];

        foreach ($this->board as $rowKeys => $row) {
            foreach ($row as $colKeys => $col) {
                if ($col === null) {
                    $emptyCells[][] = [
                        'row' => $rowKeys,
                        'col' => $colKeys,
                    ];
                }
            }
        }


        if (!empty($emptyCells)) {
            $randIndex = array_rand($emptyCells);

            $randRow = $emptyCells[$randIndex];

            $this->board[$randRow['row']][$randRow['col']] = $this->player;
            $this->player = "X" ? "O" : "X";
        }

        $this->checkGameResult();

        $_SESSION['gameBot'] = serialize($this);
    }

    public function getBoard(): array
    {
        return $this->board;
    }


}