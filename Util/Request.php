<?php

declare(strict_types=1);

namespace Util;

/**
 * PHP version 8.
 *
 * @category Util
 * @package  Request
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

class Request
{
    /**
     * Summary of uri
     * @return string
     */
    public function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Summary of method
     * @return string
     */
    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    /**
     * Summary of session
     * @return array<mixed>
     */
    public function session(): array
    {
        return $_SESSION;
    }

    /**
     * Summary of env
     * @param string $key
     * @return string
     */
    public function env(string $key = ''):string
    {
        return $_ENV[$key];
    }
}
