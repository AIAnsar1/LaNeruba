<?php

namespace Events;

use symfony\Contracts\EventDispatcher\Event;
use Contracts\IItem;


class ItemScraped extends Event
{
    public const NAME = "item.scraped";

    public function __construct(public IItem $item)
    {

    }
}