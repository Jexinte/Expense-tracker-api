<?php

declare(strict_types=1);

namespace Repository;

use PDO;
use Entity\User;
use Config\DatabaseConnection;

/**
 * PHP version 8.3
 *
 * @category Repository
 * @package  UserRepository
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
readonly class UserRepository
{
    /**
     * Summary of __construct
     * @param \Config\DatabaseConnection $db
     */
    public function __construct(private DatabaseConnection $db)
    {
    }


    /**
     * Summary of create
     * @param \Entity\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        $db = $this->db->connect();
        if (!$this->isUserAlreadyExist($user)) {
            $passwordHashed = password_hash($user->password, PASSWORD_BCRYPT);
            $req = $db->prepare("INSERT INTO user (name,password) VALUES(:name,:password)");
            $req->bindValue('name', str_replace(' ', '', $user->name));
            $req->bindValue('password', $passwordHashed);
            $req->execute();
            return true;
        }
        return false;
    }

    /**
     * Summary of isUserAlreadyExist
     * @param \Entity\User $user
     * @return bool
     */
    public function isUserAlreadyExist(User $user)
    {
        $db = $this->db->connect();
        $req = $db->prepare('SELECT * FROM user WHERE name = :name');
        $req->bindValue(':name', $user->getName());
        $req->execute();
        return is_array($req->fetch(PDO::FETCH_ASSOC));
    }
}
