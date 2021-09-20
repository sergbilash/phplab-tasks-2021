<?php

/**
 * @param array $array
 * @return string
 */
function buildUrl(array $array): string
{
    return '?' . http_build_query(array_merge($_GET, $array));
}
