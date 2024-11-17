<?php


namespace Extension\LoggerExtension;

use Contracts\IExtension;
use Utils\Configurable\Configurable;
use psr\Log\LoggerInterface;


class LoggerExtension implements IExtension
{
    use Configurable;

    private $ILogger;

    public function __construcr(LoggerInterface $ILogger)
    {
        $this->ILogger = $ILogger;
    }

    public static function getSubscribedEvents(): array
    {
        return [

        ];
    }

    public function unRunStarting(RunStartng $Event)
    {

    }
}