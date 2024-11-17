<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;
use Http\Response;

class ResponeDropped extends Event
{
    public const NAME = "response.dropped";

    public function __construct(public Response $Response)
    {

    }
}