<?php

declare(strict_types=1);

namespace Controller;

use Exception;
use Entity\User;
use Enumeration\Status\Code;
use Service\ValidatorService;
use Repository\UserRepository;
use Enumeration\Message\User as UserMessage;
use Enumeration\Regex\Username\Pattern as UserPattern;
use Enumeration\Regex\Password\Pattern as PasswordPattern;

/**
 * PHP version 8.3
 *
 * @category Controller
 * @package  UserController
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
class UserController
{
    /**
     * Summary of __construct
     * @param \Repository\UserRepository $userRepository
     * @param \Service\ValidatorService $validatorService
     */
    public function __construct(private UserRepository $userRepository, private ValidatorService $validatorService)
    {
    }

    /**
     * Summary of create
     * @param string $json
     * @return void
     */
    public function create(string $json)
    {
        $array = json_decode($json, true);
        $this->validatorService->isUsernameOrPasswordValueIsNull($array);

        $isUsernameEmpty = $this->validatorService->isValueEmpty(
            UserMessage::EMPTY_NAME,
            $array["username"]
        );
        $isUsernamePatternValid = $this->validatorService->isValueHaveTheRightPattern(
            UserPattern::FORMAT,
            strval($array["username"]),
            UserMessage::WRONG_FORMAT_FOR_NAME
        );

        $isPasswordEmpty = $this->validatorService->isValueEmpty(UserMessage::EMPTY_PASSWORD, $array['password']);
        $isPasswordPatternValid = $this->validatorService->isValueHaveTheRightPattern(
            PasswordPattern::FORMAT,
            strval($array['password']),
            UserMessage::WRONG_FORMAT_FOR_PASSWORD
        );


        $everyFieldIsValid = $this->validatorService->isEveryFieldIsValid(
            $isUsernameEmpty,
            $isUsernamePatternValid,
            $isPasswordEmpty,
            $isPasswordPatternValid
        );

        if ($everyFieldIsValid) {
            $user = new User($array["username"], $array['password']);
            $userCreated = $this->userRepository->create($user);

            if ($userCreated) {
                return;
            }
            http_response_code(Code::BAD_REQUEST);
            throw new Exception('User ' . $array['username'] . ' already exist !', Code::BAD_REQUEST);
        }
    }
}
