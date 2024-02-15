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

//    public function handlePlayerAction(Request $request)
//    {
//        $body = $request->getBody();
//        return 'Handle the Action';
//    }

    public function getPlayerService($row, $col) : void
    {

        $this->singlePlayerService->setPlayersMoves($row, $col);
        $this->singlePlayerService->checkGameResult();
    }

    public function player()
    {
        $selectedCell = $this->request->getBody()['cell'] ?? null;

        $params = [
            'gameBoard' => $this->singlePlayerService->getBoard(),
        ];

//        foreach ($selectedCell as $rowKeys => $row) {
//            foreach ($row as $collKeys => $col) {
//                $this->singlePlayerService = $this->getPlayerService($row, $collKeys);
////                if ($this->getBoard() ?? null) {
////                    dd($row); exit; // Array
////                    dd($collKeys);exit; //Int
////                    dd($this->singlePlayerService->setPlayersMoves($rowKeys, $collKeys));exit;
////                    $this->singlePlayerService = $this->player();
//
////                }
//            }
//
//        }

//        dd($selectedCell);exit;

        return $this->render('player', $params);
    }

    /**
     * @return array
     */
    public function getBoard(): array
    {
        return $this->singlePlayerService->getBoard();
    }

    public function setGameBoard() : void
    {
        if (isset($_POST['reset'])) {
            $this->board = array($this->board);
            $this->player = "X";

            unset($_SESSION['gameBoard']);

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }




}