<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// include main configuration file
require_once PROJECT_ROOT_PATH . "/db/config.php";

// include the base controller file
require_once PROJECT_ROOT_PATH . "/controllers/baseController.php";

// include the use model file
require_once PROJECT_ROOT_PATH . "/models/chamado.php";
?>