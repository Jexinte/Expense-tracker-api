<?php

declare(strict_types=1);

namespace Enumeration\Regex\Route;

/**
 * PHP version 8.3
 *
 * @category Enumeration\Regex\Route
 * @package  Pattern
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-tracker-api
 */
enum Pattern
{
    public const string SIGN_UP = '/expense-tracker-api\/public\/index\.php\/v1\/signup$/';
    public const string LOGIN = '/expense-tracker-api\/public\/index\.php\/login$/';
    public const string LOGOUT = '/expense-tracker-api\/public\/index\.php\/logout$/';
    public const string EXPENSES_LIST = '/expense-tracker-api\/public\/index\.php\/expenses$/';
    public const string EXPENSE_SHOW = '/expense-tracker-api\/public\/index\.php\/expenses\/\d+$/';
    public const string EXPENSES_CREATE = '/expense-tracker-api\/public\/index\.php\/expenses\/create$/';
    public const string EXPENSES_UPDATE = '/expense-tracker-api\/public\/index\.php\/expenses\/update\/\d+$/';
    public const string EXPENSES_DELETE = '/expense-tracker-api\/public\/index\.php\/expenses\/delete\/\d+$/';
    public const string EXPENSES_FILTER_BY_PAST_WEEK = '/expense-tracker-api\/public\/index\.php\/expenses(?:\?filter=pastWeek)$/';
    public const string EXPENSES_FILTER_BY_LAST_MONTH = '/expense-tracker-api\/public\/index\.php\/expenses(?:\?filter=lastMonth)$/';
    public const string EXPENSES_FILTER_BY_LAST_THREE_MONTH = '/expense-tracker-api\/public\/index\.php\/expenses(?:\?filter=lastThreeMonth)$/';
    public const string EXPENSES_FILTER_BY_LAST_SIX_MONTH = '/expense-tracker-api\/public\/index\.php\/expenses(?:\?filter=lastSixMonth)$/';
    public const string EXPENSES_FILTER_BY_A_YEAR = '/expense-tracker-api\/public\/index\.php\/expenses(?:\?filter=\d{4})$/';
    public const string EXPENSES_FILTER_BY_START_AND_END_DATE = '/expense-tracker-api\/public\/index\.php\/expenses(?:\?filter=startDate=\d{1,2}\/\d{1,2}\/\d{4}&endDate=\d{1,2}\/\d{1,2}\/\d{4})$/';

    public const array POST_ROUTES = [self::SIGN_UP,self::LOGIN,self::LOGOUT,self::EXPENSES_CREATE];
}
