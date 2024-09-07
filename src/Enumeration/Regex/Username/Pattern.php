<?php

declare(strict_types=1);

namespace Enumeration\Regex\Username;

/**
 * PHP version 8.2
 *
 * @category Enumeration\Regex\Username
 * @package  Pattern
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

enum Pattern: string
{
    public const string FORMAT = '/^[A-Z]{1}[a-zA-z\s]{1,}/';
}
