<?php

declare(strict_types=1);

use Util\Request;
use Router\Router;
use Enumeration\Database\Log;
use Service\ValidatorService;
use Config\DatabaseConnection;
use Controller\UserController;
use Repository\UserRepository;

require_once '../vendor/autoload.php';


$request = new Request();
$database = new DatabaseConnection(Log::HOST, Log::DB_NAME, Log::USERNAME, Log::PASSWORD);
$userRepository = new UserRepository($database);
$validatorService = new ValidatorService();
$userController = new UserController($userRepository, $validatorService);
$router = new Router($request, $userController);

try {
    ob_start();
    $router->resolveRequest();
    ob_end_flush();
} catch (Exception $e) {
    echo json_encode([$e->getCode() => $e->getMessage()]);
}
header('Content-Type: application/json');
