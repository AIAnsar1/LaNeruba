<?php

namespace Events;

use Contracts\IItem;
use Http\Request;

class RequestScheduling extends Request
{
    public const NAME = "request.scheduling";

    public function __construct(public Request $request)
    {

    }
}