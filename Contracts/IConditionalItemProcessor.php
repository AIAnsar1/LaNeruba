<?php


namespace Contracts;




interface IConditionalItemProcessor 
{
    public function shouldHandle(IItem $item);
}