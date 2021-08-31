<?php


use PHPUnit\Framework\TestCase;

class countArgumentsTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($args, $expected)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$args));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [],
                ['argument_count' => 0, 'argument_values' => []]
            ],
            [
                ['arg1'],
                ['argument_count' => 1, 'argument_values' => [0 => 'arg1']]
            ],
            [
                ['arg1', 'arg2'],
                ['argument_count' => 2, 'argument_values' => [0 => 'arg1', 1 => 'arg2']]
            ],
            [
                ['arg1', 'arg2', 'arg3'],
                ['argument_count' => 3, 'argument_values' => [0 => 'arg1', 1 => 'arg2', 2 => 'arg3']]
            ]
        ];
    }
}