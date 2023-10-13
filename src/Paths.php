<?php

namespace Filesystem;

/**
 * Построитель путей
 */
class Paths
{
    /**
     * Собирает путь
     *
     * @param array $paths
     * @return Path
     */
    public static function get(array $path = []): Path
    {
        return new Path(DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $path));
    }

}
