<?php
use PHPUnit\Framework\TestCase;

class TestFirst extends TestCase
{

    public function testOne()
    {
        static::assertTrue(true);
    }

    public function testTwo()
    {
        static::assertTrue(true);
    }
}

class TestSecond extends TestCase
{
    public function testOne()
    {
        static::assertFalse(false);
    }
}