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

        $input = fopen('php://input', 'w');
        $jsonContent = stream_get_contents($input);



        switch (true) {
            case preg_match(Pattern::SIGN_UP, $uri):
                $this->userController->create($jsonContent);
                echo json_encode([Code::OK => User::REGISTERED_SUCCESSFULLY]);
                break;
        }
    }
}
