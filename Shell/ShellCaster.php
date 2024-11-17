<?php


namespace Shell\ShellCaster;

use Symfony\Component\DomCrawler\{Crawler, Link};
use Symfony\Component\VarDumper\Caster\Caster;
use Http\Response;

class ShellCaster
{   
    /**
     * =====================================================================
     *          castResponse()
     * =====================================================================
     * переобразовывваем обхект Response в массив содержающий два ответа
     * Status и Url
     *  
     *
     * @param Response $response
     * @return array
     */
    public static function castResponse(Response $response): array
    {
        return [
            Caster::PREFIX_VIRTUAL . '.status' => $response->getStatus(),
            Caster::PREFIX_VIRTUAL . '.url' => $response->getUrl(),
        ];
    }

    /**
     * =====================================================================
     *          castCrawler()
     * =====================================================================
     * 
     * переобразовывваем объект в массив с количеством
     * узлов и их внешним HTML
     * 
     * 
     *
     * @param Crawler $crawler
     * @return array
     */
    public static function castCrawler(Crawler $crawler): array
    {
        return [
            Caster::PREFIX_VIRTUAL . '.count' => $crawler->count(),
            Caster::PREFIX_VIRTUAL . '.html' => $crawler->outerHtml(),
        ];
    }


    /**
     * =====================================================================
     *          castLink()
     * =====================================================================
     * 
     * переобразовывваем объект Link в массив с его URL
     * 
     * 
     * 
     * 
     * @param Link $link
     * @return array
     */
    public static function castLink(Link $link): array
    {
        return [ Caster::PREFIX_PROTECTED . '.url' => $link->getUri() ];
    }
}