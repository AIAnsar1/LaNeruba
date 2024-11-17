<?php



namespace Contracts;


interface IDroppable
{
    public function drop(string $reason):static;
    public function wasDropped():bool;
    public function getDropReason():string;
}