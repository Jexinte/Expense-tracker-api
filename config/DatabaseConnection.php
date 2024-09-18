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
    private PDO $database;
    /**
     * Summary of __construct
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    public function __construct(
        private readonly string $host,
        private readonly string $dbname,
        private readonly string $username,
        private readonly string $password
    ) {
        try {
            $this->database = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname,
                $this->username,
                $this->password
            );
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Error :" . $e->getMessage();
        }
    }


    /**
     * Summary of connect
     * @return \PDO|string
     */
    public function connect(): PDO|string
    {
        return $this->database;
    }
}
