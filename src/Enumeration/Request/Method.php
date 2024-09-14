<?php

declare(strict_types=1);

namespace Enumeration\Request;

/**
 * PHP version 8.3
 *
 * @category Enumeration\RequestMethod
 * @package  Method
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

enum Method: string
{
    public const string POST = 'POST';
    public const string PUT = "PUT";
    public const string DELETE = "DELETE";
    public const string GET = "GET";
}
