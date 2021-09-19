<?php

use PHPUnit\Framework\TestCase;

class getUniqueFirstLettersTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     * @param array $input
     * @param array $expected
     */
    public function testGetUniqueFirstLetters(array $input, array $expected): void
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function dataProvider(): array
    {
        return [
            [
                [
                    [
                        "name" => "Albuquerque Sunport International Airport",
                        "code" => "ABQ",
                        "city" => "Albuquerque",
                        "state" => "New Mexico",
                        "address" => "2200 Sunport Blvd, Albuquerque, NM 87106, USA",
                        "timezone" => "America/Los_Angeles",
                    ],
                    [
                        "name" => "Washington Ronald Reagan National Airport",
                        "code" => "DCA",
                        "city" => "Washington - DCA",
                        "state" => "Virginia",
                        "address" => "Arlington, VA 22202, USA",
                        "timezone" => "America/New_York",
                    ],
                    [
                        "name" => "Denver International",
                        "code" => "DEN",
                        "city" => "Denver",
                        "state" => "Colorado",
                        "address" => "8500 Peña Blvd, Denver, CO 80249, USA",
                        "timezone" => "America/Denver",
                    ]
                ],
                ['A', 'D', 'W']
            ]
        ];
    }
}
