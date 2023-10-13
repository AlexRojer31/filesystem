<?php

namespace Filesystem\Exceptions;

/**
 * Ошибка чтения файла
 */
class FileReadException extends FilesystemException
{
    public function __construct(string $filepath)
    {
        $message = 'Не удалось прочитать файл ' . $filepath .'.';
        parent::__construct($message);
    }
}
