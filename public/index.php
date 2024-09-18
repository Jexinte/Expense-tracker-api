<?php

declare(strict_types=1);

use Util\Request;
use Router\Router;
use Service\ValidatorService;
use Config\DatabaseConnection;
use Controller\UserController;
use Repository\UserRepository;

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASSWORD']);

$request = new Request();
$database = new DatabaseConnection(
    $request->env('DB_HOST'),
    $request->env('DB_NAME'),
    $request->env('DB_USERNAME'),
    $request->env('DB_PASSWORD')
);
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
