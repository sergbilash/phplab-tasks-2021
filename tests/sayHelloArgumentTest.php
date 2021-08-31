<?php

use PHPUnit\Framework\TestCase;

class sayHelloArgumentTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($expected, $arg): void
    {
        $this->assertEquals("Hello {$expected}", $this->functions->sayHelloArgument($arg));
    }

    public function positiveDataProvider(): array
    {
        return [
            [123, 123],
            ['Hello', 'Hello'],
            [true, true]
        ];
    }
}

