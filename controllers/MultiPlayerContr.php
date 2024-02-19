<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\Services\MultiPlayerService;

class MultiPlayerContr extends Controller
{
    private MultiPlayerService $multiPlayerService;

    public function __construct(private readonly Request $request)
    {
        $this->multiPlayerService = new MultiPlayerService();
    }

    public function computer(): false|array|string
    {
        $selectedCell = $this->request->getBody()['cell'] ?? null;

        try {
            if (is_array($selectedCell)) {
                $rowKeys = array_keys($selectedCell);
                $row = array_shift($rowKeys);

                $cellKeys = array_keys($_POST['cell'][$row]);
                $col = array_shift($cellKeys);

                $this->multiPlayerService->getPlayerMove($row, $col);
                $this->multiPlayerService->setBotMoves();
                $this->multiPlayerService->checkGameResult();
            }
        } catch (\Exception $exception) {
            throw new \Error($exception);
        }

        $params = [
            'gameBoard' => $this->multiPlayerService->getBoard(),
        ];

        return $this->render('computer', $params);
    }

}