<?php

class DeadCodeTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        // Hier stand mal mehr drin, ist mittlerweile aber rausgefallen
    }

    public function testSomething()
    {
        // Here be test
        self::assertSame(true, true);
    }
}