<?php

namespace Filesystem\Exceptions;

/**
 * Ошибка закрытия файла
 */
class FileCloseException extends FilesystemException
{
    public function __construct(string $filepath)
    {
        $message = 'Файл ' . $filepath . ' не закрылся.';
        parent::__construct($message);
    }
}
