<?php

declare(strict_types=1);

namespace Manager;

use Util\Request;

/**
 * PHP version 8.3
 *
 * @category Manager
 * @package  Session
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

class Session
{
    /**
     * Summary of __construct
     * @param Request $request
     */
    public function __construct(private Request $request)
    {
    }

    /**
     * Summary of startSession
     * @return void
     */
    public function startSession(): void
    {

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Summary of destroySession
     * @return void
     */
    public function destroySession(): void
    {

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }



    /**
     * Summary of initializeKeyAndValue
     * @param string $key
     * @param string|null|int $value
     * @return void
     */
    public function initializeKeyAndValue(string $key, string|null|int $value): void
    {
        $this->request->session()[$key] = $value;
    }


    /**
     * Summary of getSessionData
     * @return array<mixed>
     */
    public function getSessionData(): array
    {
        return $this->request->session();
    }
}
