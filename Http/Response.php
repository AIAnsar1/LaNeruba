<?php


namespace Http;

use Contracts\IDroppable\IDroppable;
use Symfony\Component\DomCrawler\Crawler;
use utils\{HasMetaData, Droppable};



class Response implements IDroppable
{
    use HasMetaData, Droppable;
    private Crawler $crawler;

    public function __construct()
    {
        
    }
}