<?php

namespace Router;

use Util\Request;

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
    public function __construct(private Request $request)
    {
    }

}
