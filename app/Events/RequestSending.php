<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;
use Http\Request;

class RequestSending extends Event
{
    public const NAME = "request.sending";

    public function __construct(public Request $request)
    {

    }
}