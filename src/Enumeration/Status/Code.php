<?php

declare(strict_types=1);

namespace Enumeration\Status;

/**
 * PHP version 8.3
 *
 * @category Enumeration\Status
 * @package  Code
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

enum Code: string
{
    public const int OK = 200;
    public const int CREATED = 201;
    public const int NO_CONTENT = 204;
    public const int BAD_REQUEST = 400;
    public const int NOT_FOUND = 404;
    public const int FORBIDDEN = 403;
    public const int UNAUTHORIZED = 401;
}
