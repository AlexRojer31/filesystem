<?php

namespace Filesystem;

use PHPUnit\Framework\TestCase;

class PathTest extends TestCase
{
    /**
     * @covers Path->__toString()
     */
    public function testPath() : void
    {
        $path = new Path('my/path');
        $this->assertIsString($path->__toString());
    }
}

