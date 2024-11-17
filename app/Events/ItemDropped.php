<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;


class ItemDropped extends Event
{
    public const NAME = "item.dropped";

    public function __construct(public IItem $item)
    {

    }
}