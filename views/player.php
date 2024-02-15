<?php

//use \app\controllers\SinglePlayerContr;
//
//try {
//    if (isset($_SESSION['playerGame'])) {
//        $playerGame = unserialize($_SESSION['playerGame']);
////        dd($playerGame);exit;
//    } else {
//        $playerGame = new SinglePlayerContr();
//        $_SESSION['playerGame'] = serialize($playerGame);
//    }

//    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//       if (isset($_POST['cell'])) {
//           $rowKeys = array_keys($_POST['cell']);
//           $row = array_shift($rowKeys);
//
//           $cellKeys = array_keys($_POST['cell'][$row]);
//           $col = array_shift($cellKeys);
//
//           $playerGame->getPlayerService($row, $col);
//           $gameBoard = $playerGame->getBoard();
//       }
//    }

//    dd($_SERVER);exit;
//    if (isset($_POST['reset'])) {
//        unset($_SESSION);
//
//        $playerGame->setGameBoard();
//
//
////        header('Location:' . $_SERVER['REQUEST_URI']);
////        exit();
//    }

//    if (isset($_POST['switch'])) {
//        unset($_SESSION);
//
//        header('Location' . '/newgame/public/');
//        exit();
//    }

//    $gameBoard = $playerGame->getBoard();
//    dd($gameBoard);exit;

//    $_SESSION['playerGame'] = serialize($playerGame);
//    dd($_SESSION);
//} catch(Exception $error) {
//    echo $error->getMessage();
//}
//?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/styles.css">
    <title>Tic Tac Toe</title>
</head>
<body class="">
    <main>
        <div class="d-flex flex-column align-items-center justify-content-center mt-5 mx-auto">
            <h2 class="fs-1 fw-bold">Tic Tac Toe</h2>
            <aside class="gap-5 d-flex align-items-center justify-content-center my-4 mx-auto">
                <h3 class="fs-3 fw-semibold">Player vs Player</h3>
            </aside>

            <?php
            // Проверка за това кой печели
//            if ($game->decideGameWinner()) {
//                echo "<h2 class='d-flex align-items-center justify-content-center mb-3'>The winner is
//                            <strong class='pl-2 fs-3 d-flex align-items-center justify-content-center'>' ' {$game->decideGameWinner()}</strong> </h2>";
//            }
            ?>

            <form action="" method="post" class="d-block align-content-center mx-auto">
                <div>
                    <?php
                    for ($i = 0; $i <= 2; $i++) {
                        for ($j = 0; $j <= 2; $j++) {
                            // value='" . $gameBoard[$i][$j] . "'
                            echo "<input type='submit' data-row='$i' data-col='$j' value='" . $gameBoard[$i][$j] . "'  class='box-model' name='cell[$i][$j]'/>";
                        }
                        echo "<br>";
                    }
                    ?>
                </div>
                <div class="gap-4 d-flex align-items-center justify-content-center m-4">
                    <button type='submit' name='reset' id='reset' class='btn btn-info'>Rest Game</button>
                    <button type="button" name="switch" id="switch" class="btn btn-warning">
                        <a style="text-decoration: none" href="/newgame/public/"> Switch Mode </a>
                    </button>
                </div>
            </form>
        </div>

    </main>
</body>
