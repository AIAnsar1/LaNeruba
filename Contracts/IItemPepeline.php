<?php


namespace Contracts;



interface IItemPepeline
{
    public function setProcessors(IItemProcessor ...$processors);
    public function sendItem(IItem $item);
}