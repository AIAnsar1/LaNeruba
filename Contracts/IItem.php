<?php


namespace Contracts;

interface IItem extends \ArrayAccess, IDroppable
{
    public function all(): array;
    public function get(string $key, mixed $value = null): mixed;
    public function set(string $key, mixed $value): IItem;
    public function has(string $key): bool;
}