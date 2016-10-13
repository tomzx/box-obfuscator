<?php

namespace tomzx\BoxObfuscator\Test;

use tomzx\BoxObfuscator\PHP;

class PHPTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \tomzx\BoxObfuscator\PHP
     */
    protected $compactor;

    protected function setUp()
    {
        $this->compactor = new PHP();
    }

    public function testCompact()
    {
        $actual = $this->compactor->compact('<?php function longName($variable1) { $variable1 = \'Test\'; }');
        $expected = '<?php'."\n".'function longName($a){$a = \'Test\';}';
        $this->assertEquals($expected, $actual);
    }

    public function testCompactWithInvalidContentReturnsInitialContent()
    {
        $content = '<?php function longName($variable1) $variable1 = \'Test\'; }';
        $actual = $this->compactor->compact($content);
        $expected = $content;
        $this->assertEquals($expected, $actual);
    }
}
