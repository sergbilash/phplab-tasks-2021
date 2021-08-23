<?php

namespace basics;

class Basics implements BasicsInterface
{

    private BasicsValidatorInterface $validator;

    /**
     * Basics constructor.
     * @param BasicsValidatorInterface $validator
     */
    public function __construct(BasicsValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param int $minute
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);

        $ref = [
            0 => 'fourth',
            1 => 'first',
            2 => 'second',
            3 => 'third',
            4 => 'fourth'
        ];
        $key = ceil($minute / 15);
        return $ref[$key];
    }

    /**
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isLeapYear(int $year): bool
    {
        $this->validator->isYearException($year);

        if (date('L', mktime(0, 0, 0, 1, 1, $year)) == '1') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $input
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);

        $sum1 = array_sum(str_split(substr($input, 0, 3)));
        $sum2 = array_sum(str_split(substr($input, 3, 3)));

        return $sum1 == $sum2;
    }
}
