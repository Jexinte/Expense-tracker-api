<?php

declare(strict_types=1);

namespace Enumeration\Regex\Password;

/**
 * PHP version 8.2
 *
 * @category Enumeration\Regex\Password
 * @package  Pattern
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

enum Pattern: string
{
    public const string FORMAT = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W]).{8,}$/';
}
