<?php

namespace Pipeline;

use Contracts\IItem;
use Utils\Droppable\Droppable;



class Item implements IItem
{
    use Droppable;

    private array $data;


    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function all(): array
    {
        return $this->data;
    }
    public function get(string $key, mixed $value = NULL): mixed
    {
        return $this->data[$key] ?? $value;
    }
    public function set(string $key, mixed $value): IItem
    {
        $this->data[$key] = $value;
        return $this;
    }
    public function has(string $key): bool
    {   
        return isset($this->dta[$key]);
    }
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }
    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset];
    }
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$offset] = $value;
    }
    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

}