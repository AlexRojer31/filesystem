<?php

namespace Filesystem\Exceptions;

use Exception;

/**
 * Исключение файловой системы
 */
class FilesystemException extends Exception
{

    public function __construct(string $message = 'Ошибка фаловой системы')
    {
        parent::__construct($message);
    }

}
