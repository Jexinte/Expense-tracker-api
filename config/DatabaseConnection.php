<?php

declare(strict_types=1);

namespace Config;

use PDO;
use PDOException;

/**
 * PHP version 8.3
 *
 * @category Config
 * @package  DatabaseConnection
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

class DatabaseConnection
{
    /**
     * Summary of __construct
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    public function __construct(private string $host, private string $dbname, private string $username, private string $password)
    {
    }


    /**
     * Summary of connect
     * @return PDO|string
     */
    public function connect(): PDO|string
    {
        try {
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Database Error :".$e->getMessage();
        }
        return $db;
    }
}
