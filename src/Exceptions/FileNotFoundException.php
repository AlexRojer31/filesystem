<?php

namespace Filesystem\Exceptions;

/**
 * Файл не найден
 */
class FileNotFoundException extends FilesystemException
{
    public function __construct(string $filepath)
    {
        $message = 'Файл ' . $filepath . ' не найден.';
        parent::__construct($message);
    }
}
