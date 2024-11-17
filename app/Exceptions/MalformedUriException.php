<?php

namespace App\Exceptions;

use Exception;

class MalformedUriException extends Exception
{
    /**
     * =====================================================================
     *         ForUri(string $Uri): MalformedUriException
     * =====================================================================
     * создает исключение MalformedUriException с сообщением
     * об ошибке указывающим на невозможность разобрать переданный URI 
     * c ключением самого URI в в текст сообщения 
     * 
     * @param string $Uri
     * @return MalformedUriException
     */
    public static function forUri(string $uri): MalformedUriException
    {
        return new self("Unable To  Parse URI {$uri}");
    }
}
