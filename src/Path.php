<?php

namespace Filesystem;

/**
 * Путь
 */
class Path
{
    /**
     * Путь к файлу или директории
     *
     * @var string
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function __toString(): string
    {
        return $this->path;
    }
}
