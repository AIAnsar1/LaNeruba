<?php

namespace App\Exceptions;

use Exception;

class QueryParameterTypeMismatchException extends Exception
{
    /**
     * =====================================================================
     *         ForInt(string $Key): QueryParameterTypeMismatchException
     * =====================================================================
     * воздает исключение если значнеие по ключу $Key невозможно привести
     * к целому числу
     * 
     * @param string $Key
     * @return QueryParameterTypeMismatchException
     */
    public static function forInt(string $key): QueryParameterTypeMismatchException
    {
        return new self("Unable To Cast Non-Numeric Parameter {$key} To An Integer");
    }

    /**
     * =====================================================================
     *         ForFloat(string $Key): QueryParameterTypeMismatchException
     * =====================================================================
     *  воздает исключение если значнеие по ключу $Key невозможно привести
     * к числу c плавающей точкой
     * 
     * @param string $Key
     * @return QueryParameterTypeMismatchException
     */
    public static function forFloat(string $key): QueryParameterTypeMismatchException
    {
        return new self("Unable To Cast Non-Numeric Parameter {$key} To A Float");
    }

    /**
     * =====================================================================
     *         ForArray(string $Key): QueryParameterTypeMismatchException
     * =====================================================================
     * воздает исключение если значнеие по ключу $Key не является массивом
     * 
     * @param string $Key
     * @return QueryParameterTypeMismatchException
     */
    public static function forArray(string $key): QueryParameterTypeMismatchException
    {
        return new self("Parameter {$key} Is Not An Array");
    }
}
