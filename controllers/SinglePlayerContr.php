<?php

namespace app\controllers;

use AllowDynamicProperties;
use app\core\Controller;
use app\core\Request;
use app\services\SinglePlayerService;

#[AllowDynamicProperties] class SinglePlayerContr extends Controller
{
    private SinglePlayerService $singlePlayerService;

    public function __construct(private readonly Request $request)
    {
        $this->singlePlayerService = new SinglePlayerService();
    }

    public function player(): array|false|string
    {
        $selectedCell = $this->request->getBody()['cell'] ?? null;

        try {
            if (is_array($selectedCell)) {
                $rowKeys = array_keys($selectedCell);
                $row = array_shift($rowKeys);

                $cellKeys = array_keys($_POST['cell'][$row]);
                $col = array_shift($cellKeys);

                $this->singlePlayerService->setPlayersMoves($row, $col);
                $this->singlePlayerService->checkGameResult();
            }
        } catch (\Exception $exception) {
            throw new \Error($exception);
        }

        $params = [
            'gameBoard' => $this->singlePlayerService->getBoard(),
        ];

        return $this->render('player', $params);
    }

}