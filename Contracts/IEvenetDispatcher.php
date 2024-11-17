<?php


namespace Contracts;


interface IEvenetDispatcher
{
    public function dispatch($event);
}