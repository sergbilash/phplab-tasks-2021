<?php

namespace basics;

class BasicsValidator implements BasicsValidatorInterface
{
    /**
     * @param int $minute
     * @throws \InvalidArgumentException
     */
    public function isMinutesException(int $minute): void
    {
        if ($minute < 0 || $minute > 60) {
            throw new \InvalidArgumentException(
                'The minutes should be in range 0-60. Input was: ' . $minute
            );
        }
    }

    /**
     * @param int $year
     * @throws \InvalidArgumentException
     */
    public function isYearException(int $year): void
    {
        if ($year < 1900) {
            throw new \InvalidArgumentException('The year should be upper then 1900. Input was: ' . $year);
        }
    }

    /**
     * @param string $input
     * @throws \InvalidArgumentException
     */
    public function isValidStringException(string $input): void
    {
        if (strlen($input) !== 6) {
            throw new \InvalidArgumentException(
                'The argument should be only for 6 digits. Input was: ' . $input
            );
        }
    }
}

