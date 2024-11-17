<?php

namespace Processor;

use Contracts\{IConditionalItemProcessor, IItem};
use Utils\Droppable\Droppable;

abstract class CustomItemProcessor implements IConditionalItemProcessor
{
    use Droppable;


    final public function ShouldHandle(IItem $Item): bool
    {
        return \in_array($Item::class, $this->GetHandlerItemClasses(), true);
    }

    abstract public function GetHandlerItemClasses(): array;
}