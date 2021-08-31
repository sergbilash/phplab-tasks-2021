<?php


use PHPUnit\Framework\TestCase;

class sayHelloArgumentWrapperTest extends TestCase
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

        $this->functions->sayHelloArgumentWrapper($args);
    }

    public function negativeDataProvider(): array
    {
        return [
            [''],
            ['123']
        ];
    }
}


