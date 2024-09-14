<?php

declare(strict_types=1);

namespace Service;

use Exception;
use Enumeration\Status\Code;

/**
 * PHP version 8.3
 *
 * @category Service
 * @package  ValidatorService
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
class ValidatorService
{
    /**
     * Summary of isValueEmpty
     * @param string $message
     * @param string $value
     * @throws \Exception
     * @return bool
     */
    public function isValueEmpty(string $message, string $value = "")
    {
        switch (true) {
            case empty($value):
                http_response_code(Code::BAD_REQUEST);
                throw new Exception($message, Code::BAD_REQUEST);
            default:
                return true;
        }
    }

    /**
     * Summary of isValueAString
     * @param string $message
     * @param string $value
     * @throws \Exception
     * @return bool
     */
    public function isValueAString(string $message, string $value = "")
    {
        switch (true) {
            case is_string($value):
                return true;
            default:
                http_response_code(Code::BAD_REQUEST);
                throw new Exception($message, Code::BAD_REQUEST);
        }
    }

    /**
     * Summary of isValueHaveTheRightPattern
     * @param string $pattern
     * @param mixed $value
     * @param string $message
     * @throws \Exception
     * @return bool
     */
    public function isValueHaveTheRightPattern(string $pattern, mixed $value, string $message)
    {
        switch (true) {
            case preg_match($pattern, $value):
                return true;
            default:
                http_response_code(Code::BAD_REQUEST);
                throw new Exception($message, Code::BAD_REQUEST);
        }
    }

    /**
     * Summary of isUsernameOrPasswordValueIsNull
     * @param mixed $value
     * @throws \Exception
     * @return void
     */
    public function isUsernameOrPasswordValueIsNull(mixed $value)
    {
        switch (true) {
            case is_null($value):
                http_response_code(Code::BAD_REQUEST);
                throw new Exception('All fields must be filled !', Code::BAD_REQUEST);
            case is_array($value):
                $this->isUsernameOrPasswordKeyExist($value);
                break;
        }
    }

    /**
     * Summary of isUsernameOrPasswordKeyExist
     * @param array<string> $value
     * @throws \Exception
     * @return void
     */
    public function isUsernameOrPasswordKeyExist(array $value)
    {
        $username = array_key_exists('username', $value);
        $password = array_key_exists('password', $value);

        if (!$username || !$password) {
            http_response_code(Code::BAD_REQUEST);
            throw new Exception(
                'In order to be register as user, fill the following fields: username and password',
                Code::BAD_REQUEST
            );
        }
    }


    /**
     * Summary of isEveryFieldIsValid
     * @param array<mixed> $fields
     * @return bool
     */
    public function isEveryFieldIsValid(...$fields)
    {
        $isFieldsAllValids = array_map(fn ($value) => $value == true, $fields);
        return !in_array(false, $isFieldsAllValids);
    }
}
