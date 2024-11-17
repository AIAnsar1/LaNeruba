<?php



namespace Contracts;


interface IConfigurable
{
    public function configure(array $options): void;
}