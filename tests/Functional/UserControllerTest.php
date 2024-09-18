<?php

declare(strict_types=1);

namespace Test;

use PDO;
use Util\Request;
use Dotenv\Dotenv;
use Service\ValidatorService;
use Config\DatabaseConnection;
use Controller\UserController;
use Repository\UserRepository;
use PHPUnit\Framework\TestCase;

/**
 * PHP version 8.3
 *
 * @category tests/Functional
 * @package  UserControllerTest
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

class UserControllerTest extends TestCase
{
    private UserRepository $userRepository;
    private DatabaseConnection $database;
    private ValidatorService $validatorService;

    private Request $request;
    private UserController $userController;

    public const string SIGN_UP_ROUTE = 'localhost/expense-tracker-api/public/index.php/v1/signup';

    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        $dotenv = Dotenv::createImmutable("./");
        $dotenv->safeLoad();
        $dotenv->required(['DB_HOST', 'DB_NAME_TEST', 'DB_USERNAME', 'DB_PASSWORD']);
        $this->request = new Request();
        $this->database = new DatabaseConnection(
            $this->request->env('DB_HOST'),
            $this->request->env('DB_NAME_TEST'),
            $this->request->env('DB_USERNAME'),
            $this->request->env('DB_PASSWORD')
        );
        $this->userRepository = new UserRepository($this->database);
        $this->validatorService = new ValidatorService();
        $this->userController = new UserController($this->userRepository, $this->validatorService);
    }

    /**
     * Summary of deleteUserAfterBeenCreated
     * @param array<string> $user
     * @return void
     */
    public function deleteUserAfterBeenCreated(array $user): void
    {
        $db = $this->database->connect();
        $reqDeleteUser = $db->prepare("DELETE FROM user WHERE id = :id");
        $reqDeleteUser->bindValue('id', $user['id']);
        $reqDeleteUser->execute();
    }

    /**
     * Summary of resetPrimaryKeyOfTable
     * @param string $tableName
     * @return void
     */
    public function resetPrimaryKeyOfTable(string $tableName): void
    {
        $db = $this->database->connect();
        $reqResetPrimaryKey = $db->prepare("ALTER TABLE $tableName AUTO_INCREMENT = 1 ");
        $reqResetPrimaryKey->execute();
    }
    /**
     * Summary of testShouldReturnTheSameUsernameWhenCreated
     * @return void
     */
    public function testShouldReturnTheSameUsernameWhenCreated(): void
    {
        $array = ["username" => "John","password" => "loremipsumDolor123#"];
        $json = json_encode($array);
        $this->userController->create($json);

        $db = $this->database->connect();
        $req = $db->prepare('SELECT * FROM user ORDER BY id DESC LIMIT 1');
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);

        $this->deleteUserAfterBeenCreated($user);
        $this->resetPrimaryKeyOfTable("user");

        $this->assertSame($array['username'], $user['name']);
    }
}
