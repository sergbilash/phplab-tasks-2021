<?php


namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    private Movie $movie;

    public function __construct()
    {
        $this->movie = new Movie();
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

        $this->movie->setTitle($title[1]);
        $this->movie->setPoster($poster[1]);
        $this->movie->setDescription($description[1]);

        return $this->movie;
    }
}
