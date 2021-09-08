<?php


namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    private Movie $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent): Movie
    {
        preg_match('/<h1[^>]*>(.*?)<\/h1>/', $siteContent, $title);
        preg_match('/<img.*?src=[\'"](https.*)[\'"].*?class="poster.*>/', $siteContent, $poster);
        preg_match('/<div.*class="about".*?><div.*?>(.*?)<\/div>/', $siteContent, $description);

        return $this->movie->setTitle($title[1])->setPoster($poster[1])->setDescription($description[1]);
    }
}
