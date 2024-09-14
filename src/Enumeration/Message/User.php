<?php

declare(strict_types=1);

namespace Enumeration\Message;

/**
 * PHP version 8.3
 *
 * @category Enumeration\Message
 * @package  User
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

enum User: string
{
    public const string NAME_IS_NOT_A_STRING = "The username value have to be a string !";
    public const string PASSWORD_IS_NOT_A_STRING = "The password value have to be a string !";
    public const string WRONG_FORMAT_FOR_NAME = "The username have to start with an uppercase letter !";
    public const string WRONG_FORMAT_FOR_PASSWORD = "The password have to start with an uppercase letter !";
    public const string EMPTY_NAME = "The username field cannot be empty !";
    public const string EMPTY_PASSWORD = "The password field cannot be empty !";
    public const string REGISTERED_SUCCESSFULLY = "User registered successfully !";
}
