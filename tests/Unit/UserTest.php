<?php

declare(strict_types=1);
use Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public User $user;

    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        $this->user = new User("John", "test");
    }

    /**
     * Summary of testShouldReturnTheSameId
     * @return void
     */
    public function testShouldReturnTheSameId(): void
    {
        $this->user->setId(1);
        $this->assertSame(1, $this->user->getId());
    }

    /**
     * Summary of testShouldReturnTheSameName
     * @return void
     */
    public function testShouldReturnTheSameName(): void
    {
        $this->assertSame("John", $this->user->getName());
    }

    /**
     * Summary of testShouldReturnTheSamePassword
     * @return void
     */
    public function testShouldReturnTheSamePassword(): void
    {
        $this->assertSame("test", $this->user->getPassword());
    }

}
