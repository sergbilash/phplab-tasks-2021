<?php


namespace strings;


class Strings implements StringsInterface
{

    /**
     * @param string $input
     * @return string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        return lcfirst((str_replace('_', '', ucwords($input, '_'))));
    }

    /**
     * @param string $input
     * @return string
     */
    public function mirrorMultibyteString(string $input): string
    {
        $result = '';
        $arr = explode(' ', $input);
        foreach ($arr as $value) {
            $res = '';
            for ($i = mb_strlen($value) - 1; $i >= 0; $i--) {
                $res .= mb_substr($value, $i, 1);
            }
            $result .= $res . ' ';
            unset($res);
        }

        return trim($result);
    }

    /**
     * @param string $noun
     * @return string
     */
    public function getBrandName(string $noun): string
    {
        $noun = trim(strtolower($noun));
        if (substr($noun, 0, 1) == substr($noun, -1)) {
            return ucfirst($noun) . substr($noun, 1, strlen($noun));
        } else {
            return 'The ' . ucfirst($noun);
        }
    }
}
