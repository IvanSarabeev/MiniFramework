<?php

namespace app\services;

class GameServices
{
    public string $player = "X";
    public array $board = [];

    public function checkGameResult()
    {
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[$i][0] != ''
                && $this->board[$i][0] === $this->board[$i][1]
                && $this->board[$i][1] === $this->board[$i][2]) {
                return $this->board[$i][0];
            }
        }

        // Проверка посредство колоните
        for ($i = 1; $i < 3; $i++) {
            if ($this->board[0][$i] != ''
                && $this->board[0][$i] === $this->board[1][$i]
                && $this->board[1][$i] === $this->board[2][$i]) {
                return $this->board[0][$i];
            }
        }

        // Проверка посредство диагонал, ляво на дясно
        if ($this->board[0][0] != ''
            && $this->board[0][0] === $this->board[1][1]
            && $this->board[1][1] === $this->board[2][2]) {
            return $this->board[0][0];
        }

        // Проверка посредство диагонала в обратната посока, дясно на ляво
        if ($this->board[0][2] != ''
            && $this->board[0][2] === $this->board[1][1]
            && $this->board[1][1] === $this->board[2][0]) {
            return $this->board[0][2];
        }

    }

}