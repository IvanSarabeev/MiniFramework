<?php

namespace app\services;

class MultyPlayerService extends GameServices
{

    protected function setBotMoves()
    {
        $emptyCells = [];

        foreach ($this->board as $rowKeys => $row) {
            foreach ($row as $colKeys => $col) {
                if ($col === null){
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
    }


}