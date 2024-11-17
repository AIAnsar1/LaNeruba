<?php


namespace Utils\HasMetaData;



trait HasMetaData
{
    private array $meta = [];


    /**
     * =====================================================================
     *   getMeta(string $Key, mixed $Default = null): mixed
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return mixed
     */
    public function getMeta(string $key, mixed $value = null): mixed
    {
        return $this->meta[$key] ?? $value;
    }

    /**
     * =====================================================================
     *      withMeta(string $key, mixed $value): object
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return object
     */

    public function withMeta(string $key, mixed $value): object
    {
        $newThis = clone $this;
        $newThis->meta[$key] = $value;
        return $newThis;
    }
}