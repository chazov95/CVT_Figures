<?php

use App\Controllers\FigureController;
try{
    if (isset($_POST['action']) && !empty($_POST['action'])) {
        $type = $_POST['action'];

        switch ($type) {
            case 'circleAdd':
                $figureController = new FigureController($_POST);
                $result = $figureController->addCircle();
                break;
            case 'triangleAdd':
                $figureController = new FigureController($_POST);
                $result = $figureController->addTriangle();
                break;
            case 'parallelogramAdd':
                $figureController = new FigureController($_POST);
                $result = $figureController->addParallelogram();
                break;
        }
    }

    if (isset($_GET['action']) && !empty($_GET['action'])) {
        $type = $_GET['action'];

        switch ($type) {
            case 'getFigureList':
                $result = FigureController::list();
                break;
        }
    }
}catch (Throwable $exception){
    $result =[
        'error' => $exception->getMessage(),
        'trace' => $exception->getTrace()
    ];
}

print_r(json_encode($result));
