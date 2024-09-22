<?php

namespace Router;

use Util\Request;
use Enumeration\Status\Code;
use Enumeration\Message\User;
use Controller\UserController;
use Enumeration\Regex\Route\Pattern;

/**
 * PHP version 8.3
 *
 * @category Router
 * @package  Router
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
class Router
{
    /**
     * Summary of __construct
     * @param \Util\Request $request
     */
    public function __construct(private Request $request, private UserController $userController)
    {
    }

    /**
     * Summary of resolveRequest
     * @return void
     */
    public function resolveRequest(): void
    {
        $uri = $this->request->uri();
        $loader = new \Twig\Loader\FilesystemLoader('../templates/documentation');
        $twig = new \Twig\Environment($loader, [
            'cache' => false
        ]);
        $input = fopen('php://input', 'w');
        $jsonContent = stream_get_contents($input);
        $jsonResponse = [];


        switch (true) {
            case preg_match(Pattern::SIGN_UP, $uri):
                $this->userController->create($jsonContent);
                $jsonResponse[Code::OK] = User::REGISTERED_SUCCESSFULLY;
                break;
            default:
                header('Content-Type: text-plain');
                echo $twig->render('base.twig');
                break;
        }
        echo json_encode($jsonResponse);
    }
}
