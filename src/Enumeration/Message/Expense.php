<?php

declare(strict_types=1);

namespace Enumeration\Message;

/**
 * PHP version 8.3
 *
 * @category Enumeration\Message
 * @package  Expense
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
enum Expense: string
{
    public const string NAME_IS_NOT_A_STRING = "The name value have to be a string!";
    public const string WRONG_FORMAT_FOR_NAME = "The name of the expense have to start with an uppercase letter";
    public const string EMPTY_NAME = "The name field cannot be empty !";
    public const string DESCRIPTION_IS_NOT_A_STRING = "The description value have to be a string!";
    public const string WRONG_FORMAT_FOR_DESCRIPTION = "The description of the expense have to start with an uppercase letter";
    public const string EMPTY_DESCRIPTION = "The description field cannot be empty !";

    public const string CATEGORY_IS_NOT_A_STRING = "The category value have to be a string!";
    public const string WRONG_FORMAT_FOR_CATEGORY = "The category of the post have to start with an uppercase letter !";
    public const string EMPTY_CATEGORY = "The category field cannot be empty !";
}
