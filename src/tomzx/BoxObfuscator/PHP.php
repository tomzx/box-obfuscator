<?php

namespace tomzx\BoxObfuscator;

use Herrera\Box\Compactor\Compactor;
use Naneau\Obfuscator\Obfuscator;

class PHP extends Compactor
{
    /**
     * @var array
     */
    protected $extensions = ['php'];

    /**
     * Compacts the file contents.
     *
     * @param string $contents The contents.
     *
     * @return string The compacted file contents.
     */
    public function compact($contents)
    {
        $obfuscator = new Obfuscator();
        return $obfuscator->obfuscateContent($contents);
    }
}
