<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;
use Http\Response;

class ResponeReceived extends Event
{
    public const NAME = "response.processed";

    public function __construct(public Response $Response)
    {

    }
}