<?php


namespace Contracts;


interface IItemProcessor extends IConfigurable
{
    public function processItem(IItem $item): IItem;
}