<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param array $airports
 * @return array
 */
function getUniqueFirstLetters(array $airports): array
{
    $result = [];
    for ($i = 0; $i < count($airports); $i++) {
        $result[] = $airports[$i]['name'][0];
    }
    sort($result);
    return array_unique($result);
}

/**
 * @param array $array
 * @return string
 */
function buildUrl(array $array): string
{
    return '?' . http_build_query(array_merge($_GET, $array));
}

/**
 * @param array $airports
 * @return string
 */
function filterByFirstLetter(array $airports): string
{
    return substr($airports['name'], 0, 1) === $_GET["filter_by_first_letter"];
}

/**
 * @param array $airports
 * @param string $state
 * @return string
 */
function filterByState(array $airports): string
{
    return $airports['state'] === $_GET["filter_by_state"];
}

/**
 * @param array $airports
 * @param int $itemsPerPage
 * @param $currentPage
 * @return array
 */
function Pagination(array $airports, int $itemsPerPage, int $currentPage): array
{
    $offset = ($currentPage - 1) * $itemsPerPage;
    if ($offset < 0) $offset = 0;
    return array_slice($airports, $offset, $itemsPerPage);
}