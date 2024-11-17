<?php



namespace Contracts;


interface IClient
{
    public function pool(array $requests, ?callable $onFullFilled = NULL, ?callable $onRefected = NULL): void;
}