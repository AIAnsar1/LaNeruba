<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;
use Http\Run;

class RunFinished extends Event
{
    public const NAME = "run.finished";

    public function __construct(public Run $Run)
    {

    }
}