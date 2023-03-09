<?php


use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase {
    public function testAddition() {
        $this->assertEquals(4, 2+2);
    }
}