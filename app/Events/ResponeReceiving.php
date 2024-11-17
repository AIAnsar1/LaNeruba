<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;
use Http\Response;

class ResponeReceiving extends Event
{
    public const NAME = "response.received";

    public function __construct(public Response $response)
    {

    }
}