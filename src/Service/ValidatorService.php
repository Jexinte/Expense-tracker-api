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
     * Summary of isNoKeysPresents
     * @param mixed $arrayOfDataFromjson
     * @param array<mixed> $keysNameRequired
     * @throws \Exception
     * @return void
     */
    public function isNoKeysPresents(mixed $arrayOfDataFromjson, array $keysNameRequired): void
    {
        switch (true) {
            case is_array($arrayOfDataFromjson):
                $keys = array_keys($arrayOfDataFromjson);
                if (empty($keys)) {
                    http_response_code(Code::BAD_REQUEST);
                    throw new Exception(
                        "The following fields with their values are required : "
                         . implode(',', $keysNameRequired),
                        Code::BAD_REQUEST
                    );
                }
                break;
        }
    }

    /**
     * Summary of checkMissingFields
     * @param mixed $arrayOfDataFromjson
     * @param array<mixed> $keysNameRequired
     * @throws \Exception
     * @return void
     */
    public function checkMissingFields(mixed $arrayOfDataFromjson, array $keysNameRequired): void
    {
        $this->isNoKeysPresents($arrayOfDataFromjson, $keysNameRequired);

        $keys = array_keys($arrayOfDataFromjson);
        foreach ($keysNameRequired as $fieldRequired) {
            if (!in_array($fieldRequired, $keys)) {
                http_response_code(Code::BAD_REQUEST);
                throw new Exception(
                    "The field $fieldRequired is missing !",
                    Code::BAD_REQUEST
                );
            }
        }
    }
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
