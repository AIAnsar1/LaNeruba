<?php

namespace App\Exceptions;

use Exception;

class UnknownQueryParameterException extends Exception
{
    /**
     * =====================================================================
     *         ForInt(string $Key): QueryParameterTypeMismatchException
     * =====================================================================
     *  воздает исключение если запращиваемый параметр отсутсвуетв
     * в строке запроса
     * 
     * @param string $Parameter
     * @return UnknownQueryParameterException
     */
    public static function forParameter(string $parameter): UnknownQueryParameterException
    {
        return new self("Trying to retrieve unknown parameter {$parameter} from query string");
    }
}
