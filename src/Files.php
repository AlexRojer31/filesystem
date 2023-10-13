<?php

namespace Filesystem;

use Filesystem\Exceptions\FileCloseException;
use Filesystem\Exceptions\FileNotFoundException;
use Filesystem\Exceptions\FileReadException;
use Filesystem\Exceptions\FileWriteException;

/**
 * Утилитарный класс для работы
 * с файлами
 */
class Files
{
    /**
     * Корневая директория
     *
     * @var string
     */
    private $rootDir;

    public function __construct(string $rootDir) {
        $this->rootDir = $rootDir;
    }

    /**
     * Возвращает полный путь
     * в файловой системе
     *
     * @param Path $path
     * @return string
     */
    public function getFullPath(Path $path): string
    {
        return  $this->rootDir . $path;
    }

    /**
     * Проверяет является ли путь
     * директорией
     *
     * @param Path $path
     * @return boolean
     */
    public function isDir(Path $path): bool
    {
        return is_dir($this->rootDir . $path);
    }

    /**
     * Проверяет является ли путь
     * файлом
     *
     * @param Path $path
     * @return boolean
     */
    public function isFile(Path $path): bool
    {
        return is_file($this->rootDir . $path);
    }

    /**
     * Читает файл
     *
     * @param Path $path
     *
     * @return string
     *
     * @throws FileCloseException
     * @throws FileReadException
     * @throws FileNotFoundException
     */
    public function readFile(Path $path): string
    {
        if ($this->isFile($path)) {
            $handle = fopen($this->getFullPath($path), FileMode::READ);
            if ($content = fread($handle, filesize(static::getFullPath($path)))) {
                if (fclose($handle)) {
                    return $content;
                } else {
                    throw new FileCloseException($this->getFullPath($path));
                }
            } else {
                throw new FileReadException($this->getFullPath($path));
            }
        } else {
            throw new FileNotFoundException($this->getFullPath($path));
        }
    }

    /**
     * Записывает в файл
     *
     * @param Path $path
     *
     * @return void
     *
     * @throws FileCloseException
     * @throws FileWriteException
     * @throws FileNotFoundException
     */
    public function writeFile(Path $path, string $content): void
    {
        if (static::isFile($path)) {
            $handle = fopen(static::getFullPath($path), FileMode::WRITE);
            if (fwrite($handle, $content)) {
                if (!fclose($handle)) {
                    throw new FileCloseException($this->getFullPath($path));
                }
            } else {
                throw new FileWriteException($this->getFullPath($path));
            }
        } else {
            throw new FileNotFoundException($this->getFullPath($path));
        }
    }

    /**
     * Создает файл
     *
     * @param Path $path
     *
     * @return void
     */
    public function createFile(Path $path): void
    {
        if (!$this->isFile($path)) {
            $dirs = explode(DIRECTORY_SEPARATOR, $path);
            $route = $this->rootDir;
            for ($i = 0; $i < count($dirs) - 1; $i++) {
                $route = $route . DIRECTORY_SEPARATOR . $dirs[$i];
                if (!is_dir($route)) {
                    mkdir($route);
                }
            }
            $handle = fopen($this->getFullPath($path), FileMode::WRITE);
            fclose($handle);
        }
    }
}
