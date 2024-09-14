<?php

declare(strict_types=1);

namespace Entity;

/**
 * PHP version 8.3
 *
 * @category Entity
 * @package  User
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
class User
{
    public int $id;

    /**
     * Summary of __construct
     * @param string $name
     * @param string $password
     */
    public function __construct(public string $name, public string $password)
    {
    }

    /**
     * Summary of setId
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Summary of getId
     * @return int
     */

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Summary of getName
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Summary of getPassword
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
