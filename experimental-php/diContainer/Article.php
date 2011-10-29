<?php

// 1

class Article 
{
    protected $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

$articles = array(
    new Article('Article 1'),
    new Article('Article 2')
);

var_dump($articles);

// 2

$mapper = 
    function ($article) use ($method)
    {
        return $article->getTitle();
    };

$titles = array_map($mapper, $articles);

var_dump($titles);

// 3

$method = 'getTitle';

$mapper = 
    function ($article) use ($method)
    {
        return $article->$method();
    };

$method = 'getTitle2';

$titles = array_map($mapper, $articles);

var_dump($titles);

// 4

$mapper = 
    function ($method)
    {
        return 
            function ($article) use ($method)
            {
                return $article->$method();
            };
    };

$titles = array_map($mapper('getTitle'), $articles);
// $author = array_map($mapper('getAuthor'), $articles);

var_dump($titles);
