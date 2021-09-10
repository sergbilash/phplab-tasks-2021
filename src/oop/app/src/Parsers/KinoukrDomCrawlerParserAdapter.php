<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
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
        $domCrawler = new Crawler($siteContent);
        $title = $domCrawler->filter('div.ftitle h1')->text();
        $poster = $domCrawler->filter('div.fposter a')->attr('href');
        $description = $domCrawler->filter('div.fdesc')->text();

        $this->movie->setTitle($title);
        $this->movie->setPoster($poster);
        $this->movie->setDescription($description);

        return $this->movie;
    }
}