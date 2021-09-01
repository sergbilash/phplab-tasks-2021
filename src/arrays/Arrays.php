<?php


namespace arrays;


class Arrays implements ArraysInterface
{

    /**
     * @param array $input
     * @return array
     */
    public function repeatArrayValues(array $input): array
    {
        $arr_result = [];

        foreach ($input as $value) {
            for ($i = 1; $i <= (int)$value; $i++) {
                $arr_result[] = $value;
            }
        }

        return $arr_result;
    }

    /**
     * @param array $input
     * @return int
     */
    public function getUniqueValue(array $input): int
    {
        $arr_result = [];

        if (empty($input)) {
            return 0;
        }

        foreach (array_count_values($input) as $key => $value) {
            if ($value == 1) {
                $arr_result[] = $key;
            }
        }

        if (!empty($arr_result)) {
            return min($arr_result);
        } else {
            return 0;
        }

    }

    /**
     * @param array $input
     * @return array
     */
    public function groupByTag(array $input): array
    {
        $arr_result = [];
        sort($input);
        for ($i = 0; $i < count($input); $i++) {
            foreach (($input[$i]['tags']) as $value) {
                $arr_result[$value][] = $input[$i]['name'];
                asort($arr_result);
            }
        }
        ksort($arr_result);
        return $arr_result;
    }
}