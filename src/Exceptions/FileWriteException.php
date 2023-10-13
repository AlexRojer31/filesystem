<?php

namespace Filesystem\Exceptions;

/**
 * Ошибка записи в файл
 */
class FileWriteException extends FilesystemException
{
    public function __construct(string $filepath)
    {
        $message = 'Запись в файл ' . $filepath . ' не удалась.';
        parent::__construct($message);
    }
}
