<?php

class DeadCodeTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testSomething()
    {
        // Here be test
        self::assertSame(true, true);
    }
}