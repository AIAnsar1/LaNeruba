<?php


namespace Http;

use Contracts\IDroppable\IDroppable;
use utils\{Droppable, HasMetaData};
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class Request implements IDroppable
{
    use HasMetaData, Droppable;

    public URL $url;

    private \Closure $parseCallback;
    private RequestInterface $psrRequest;
    private ?Response $response = NULL;
    private array $options;


    public function __construct(string $method, string $url, callable $parseMethod, array $options = [])
    {
        $this->options = $options;
        $this->psrRequest = new GuzzleRequest($method, $url);
        $this->parseCallback = \Closure::fromCallable($parseMethod);
        $this->url = URL::Parse($url);
    }


    public function getUri()
    {

    }
}