<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;
use Http\Run;

class RunStarting extends Event
{
    public const NAME = "run.starting";

    public function __construct(public Run $Run)
    {

    }
}