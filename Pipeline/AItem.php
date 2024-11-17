<?php


namespace Pipeline;

use Contracts\IItem;
use Utils\Droppable\Droppable;



abstract class AItem implements IItem
{
    use Droppable;


    /**
     * =====================================================================
     *     all(): array
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @return array
     */
    public function all(): array
    {
        $reflectionClass = new \ReflectionClass($this);
        $properties = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);

        return \array_reduce($properties, function (array $data, \ReflectionProperty $property): array {
            $Data[$property->getName()] = $property->getValue($this);
            return $data;
        }, []);
    }



    /**
     * =====================================================================
     *     get(string $key, mixed $value = NULL): mixed
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function get(string $key, mixed $value = NULL): mixed
    {
        $ReflectionClass = new \ReflectionClass($this);

        try {
            $property = $ReflectionClass->getProperty($key);
        } catch (\ReflectionException) {
            return $value;
        }

        if (!$property->isPublic())
        {
            return $value;
        }
        return $property->getValue($this) ?: $value;
    }


    /**
     * =====================================================================
     *     set(string $key, mixed $value): IItem
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param string $key
     * @param mixed $value
     * @return IItem
     */
    public function set(string $key, mixed $value): IItem
    {
        $reflectionClass = new \ReflectionClass($this);

        try {
            $property = $reflectionClass->getProperty($key);
        } catch (\ReflectionException) {
            throw new \InvalidArgumentException(\sprintf("No Public Propery { %s } Exists on Class { %s }", $key, static::class));
        }

        if (!$property->isPublic())
        {
            throw new \InvalidArgumentException(\sprintf("No Public Propery { %s } Exists on Class { %s }", $key, static::class));
        }
        $property->setValue($this, $value);

        return $this;
    }



    /**
     * =====================================================================
     *     has(string $key): bool
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        $ReflectionClass = new \ReflectionClass($this);

        try {
            $property = $ReflectionClass->getProperty($key);
            return $property->isPublic();
        } catch (\ReflectionException) {
            return false;
        }
    }


    /**
     * =====================================================================
     *    offsetExists(mixed $offset): bool
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return $this->has($offset);
    }


    /**
     * =====================================================================
     *    offsetGet(mixed $offset): mixed
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        if (!\is_string($offset))
        {
            throw new \InvalidArgumentException("Offset Needs To Be a String");
        }
        return $this->get($offset);
    }


    /**
     * =====================================================================
     *    offsetSet(mixed $offset, mixed $value): void
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!\is_string($offset))
        {
            throw new \InvalidArgumentException("Offset Needs To Be a String");
        }
        $this->set($offset, $value);
    }


    /**
     * =====================================================================
     *     offsetUnset(mixed $offset): void
     * =====================================================================
     * 
     * 
     * 
     * 
     * 
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new \RuntimeException("Unsetting Properties is not Supported for custom item classes");
    }
}