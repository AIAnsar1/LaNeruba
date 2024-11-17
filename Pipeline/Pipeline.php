<?php


namespace Pipeline;

use Contracts\{IItemPepeline, IEvenetDispatcher, IItemProcessor, IItem, IConditionalItemProcessor};



class Pipeline implements IItemPepeline
{
    private array $proeccessors = [];

    public function __construct(IEvenetDispatcher $IEvenetDispatcher)
    {

    }

    public function setProcessors(IItemProcessor ...$processors): IItemPepeline
    {
        $this->proeccessors = $processors;
        return $this;
    }

    public function sendItem(IItem $item): IItem
    {
        foreach ($this->proeccessors as $processor)
        {
            if ($processor instanceof IConditionalItemProcessor && $processor->shouldHandle($item))
            {
                continue;
            }
            $Item = $processor->ProcessItem($item);

            if ($Item->WasDropped())
            {
                $this->eventDispatcher->dispatch( new ItemDropped($item), ItemDropped::NAME);
                return $item;
            }
        }
        $this->eventDispatcher->dispatch( new ItemScraped($item),ItemScraped::NAME);
        return $item;
    }
}