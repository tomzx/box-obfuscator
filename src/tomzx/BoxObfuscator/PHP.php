<?php

namespace tomzx\BoxObfuscator;

use Herrera\Box\Compactor\Compactor;

class PHP extends Compactor
{
    /**
     * @var array
     */
    protected $extensions = ['php'];

    /**
     * @var bool
     */
    protected $keepComments = false;

    /**
     * @var bool
     */
    protected $keepFormatting = false;

    /**
     * Compacts the file contents.
     *
     * @param string $contents The contents.
     *
     * @return string The compacted file contents.
     */
    public function compact($contents)
    {
        $container = new \Naneau\Obfuscator\Container();
        /** @var \Naneau\Obfuscator\Obfuscator $obfuscator */
        $obfuscator = $container->getContainer()->get('obfuscator');
        try {
            return $obfuscator->obfuscateContent($contents, [
                'keep_comments' => $this->keepComments,
                'keep_formatting' => $this->keepComments
            ]);
        } catch (\PhpParser\Error $e) {
            // Error during parsing, just return the initial content
            return $contents;
        }
    }
}
