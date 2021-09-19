<?php

namespace src\oop\app\src\Transporters;


class CurlStrategy implements TransportInterface
{

    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        curl_close($ch);

        return iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $result);

    }
}