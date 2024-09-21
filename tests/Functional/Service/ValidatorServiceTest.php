<?php

declare(strict_types=1);

namespace Test;

use Exception;
use Enumeration\Status\Code;
use Service\ValidatorService;
use PHPUnit\Framework\TestCase;

/**
 * PHP version 8.3
 *
 * @category tests/Service
 * @package  ValidatorServiceTest
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */

class ValidatorServiceTest extends TestCase
{
    private ValidatorService $validatorService;

    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        $this->validatorService = new ValidatorService();
    }

    /**
     * Summary of testShouldRaiseAnExceptionWhenNoFieldsIsGiven
     * @return void
     */
    public function testShouldRaiseAnExceptionWhenNoFieldsIsGiven(): void
    {
        $array = [];
        $keysNameRequired = ["loremField","dummyField"];
        $this->expectException(Exception::class);
        $this->validatorService->isNoKeysPresents($array, $keysNameRequired);
    }

    /**
     * Summary of testShouldReturnTheRightExceptionMessageWitheRightCodeException
     * @return void
     */
    public function testShouldReturnTheRightExceptionMessageWitheRightCodeException(): void
    {
        $array = [];
        $keysNameRequired = ["loremField","dummyField"];
        $this->expectExceptionMessage("The following fields with their values are required : "
        . implode(',', $keysNameRequired));
        $this->expectExceptionCode(Code::BAD_REQUEST);
        $this->validatorService->isNoKeysPresents($array, $keysNameRequired);
    }

    /**
     * Summary of testShouldRaiseAnExceptionWhenARequiredFieldIsMissing
     * @return void
     */
    public function testShouldRaiseAnExceptionWhenARequiredFieldIsMissing(): void
    {
        $array = ["loremmField" => "John","dummyField" => "loremipsumDolor123#"];
        $this->expectException(Exception::class);
        $this->validatorService->checkMissingFields($array, ["loremField","dummyField"]);
    }


    /**
     * Summary of testShouldReturnTheRightExceptionMessageWhenTheFieldIsMissingAndTheRightCodeException
     * @return void
     */
    public function testShouldReturnTheRightExceptionMessageWhenTheFieldIsMissingAndTheRightCodeException(): void
    {
        $array = ["loremmField" => "John","dummyField" => "loremipsumDolor123#"];
        $this->expectExceptionMessage('The field loremField is missing !');
        $this->expectExceptionCode(Code::BAD_REQUEST);
        $this->validatorService->checkMissingFields($array, ["loremField","dummyField"]);
    }

    /**
     * Summary of testShouldRaiseAnExceptionWhenAFieldValueIsEmpty
     * @return void
     */
    public function testShouldRaiseAnExceptionWhenAFieldValueIsEmpty(): void
    {

        $array = ["loremField" => "","dummyyField" => "loremipsumDolor123#"];
        $this->expectException(Exception::class);
        $this->validatorService->isValueEmpty("no need here to test the message", $array['loremField']);
    }

    /**
     * Summary of testShouldReturnExceptionMessageWhenAFieldValueIsEmptyAndTheRightCodeException
     * @return void
     */
    public function testShouldReturnExceptionMessageWhenAFieldValueIsEmptyAndTheRightCodeException(): void
    {

        $array = ["loremField" => "","dummyField" => "loremipsumDolor123#"];
        $this->expectExceptionMessage("The field lorem is cannot be empty !");
        $this->expectExceptionCode(Code::BAD_REQUEST);
        $this->validatorService->isValueEmpty('The field lorem is cannot be empty !', $array['loremField']);
    }


    /**
     * Summary of testShouldReturnTrueWhenAFieldValueIsGiven
     * @return void
     */
    public function testShouldReturnTrueWhenAFieldValueIsGiven(): void
    {
        $array = ["loremField" => "Test","dummyField" => "loremipsumDolor123#"];
        $this->assertTrue($this->validatorService->isValueEmpty("no need here to test the message", $array['loremField']));
    }

    /**
     * Summary of testShouldReturnTrueIfThePatternValueIsValid
     * @return void
     */
    public function testShouldReturnTrueIfThePatternValueIsValid(): void
    {
        $this->assertTrue($this->validatorService->isValueHaveTheRightPattern('/^[A-Z]{1}[a-zA-z\s]{1,}/', "John", "no need to test the message exception here !"));
    }

    /**
     * Summary of testShouldRaiseAnExceptionIfThePatternValueIsNotValid
     * @return void
     */
    public function testShouldRaiseAnExceptionIfThePatternValueIsNotValid(): void
    {
        $this->expectException(Exception::class);
        $this->validatorService->isValueHaveTheRightPattern('/^[A-Z]{1}[a-zA-z\s]{1,}/', "john", "no need to test the message exception here !");
    }

    /**
     * Summary of testShouldReturnTheRightExceptionMessageAndTheRightCodeException
     * @return void
     */
    public function testShouldReturnTheRightExceptionMessageAndTheRightCodeException(): void
    {
        $this->expectExceptionMessage("The value have to start with an uppercase letter !");
        $this->expectExceptionCode(Code::BAD_REQUEST);
        $this->validatorService->isValueHaveTheRightPattern('/^[A-Z]{1}[a-zA-z\s]{1,}/', "john", "The value have to start with an uppercase letter !");
    }

    /**
     * Summary of testShouldReturnTrueIfEveryFieldIsValid
     * @return void
     */
    public function testShouldReturnTrueIfEveryFieldIsValid(): void
    {
        $isValueEmpty = $this->validatorService->isValueEmpty("no need here to test the message", "John");
        $isValuePatternIsValid = $this->validatorService->isValueHaveTheRightPattern('/^[A-Z]{1}[a-zA-z\s]{1,}/', "John", "no need here to test the message");

        $this->assertTrue($this->validatorService->isEveryFieldIsValid($isValueEmpty, $isValuePatternIsValid));
    }
}
