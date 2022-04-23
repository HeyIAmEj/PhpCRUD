<?php
require(__DIR__ . "\modules\db\paths.php");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[2]) && $uri[2] != 'chamados') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");

    exit();
}
require PROJECT_ROOT_PATH . "\controllers\chamadoController.php";

$objFeedController = new ChamadoController();


if (!empty($uri[3])) {
    switch ($uri[3]) {
        case "criar":
            $objFeedController->create();
            break;
        case "alterar":
            $objFeedController->alterById();
            break;
        case "todos":
            $objFeedController->getAll();
            break;
        case is_numeric($uri[3]):
            $objFeedController->getById($uri[3]);
            break;
        default:
            echo(json_encode(array('error' => 'ENDPOINT ' . $uri[3] . ' nao reconhecido', 'code' => 400, 'type' => 'BAD REQUEST', 'redirect_to' => 'index.php')));
            break;
    }
} else {
    echo(json_encode(array('error' => 'PATH ' . $uri[3] . ' nao reconhecido', 'code' => 400, 'type' => 'BAD REQUEST', 'redirect_to' => 'index.php')));
    die();
}
?>