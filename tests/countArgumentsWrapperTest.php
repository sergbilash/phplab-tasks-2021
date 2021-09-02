<?php


use PHPUnit\Framework\TestCase;

class countArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($args): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->countArgumentsWrapper(...$args);
    }

    public function negativeDataProvider(): array
    {
        return [
            [[123, 'qwerty']],
            [[false, 456, 'test']]
        ];
    }
}
