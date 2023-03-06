<?php
use PHPUnit\Framework\TestCase;
require dirname(__DIR__).'/practice/function_sample.php';
class FunctionSampleTest extends  TestCase {

    public function testAddAndReturnCorrectSum() {
        $this->assertEquals(4, add(3, 1));
        $this->assertEquals(8,add(3,5));
    }

    public function testAddAndReturnIncorrectSum() {
        $this->assertNotEquals(5, add(3, 1));
        $this->assertNotEquals(7,add(3,5));
    }
}
