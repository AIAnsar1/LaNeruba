<?php 



namespace Utils\Configurable;



trait Configurable
{
    private bool $optionsResolved = false;
    private array $resolvedOptions = [];

    /**
     * =====================================================================
     *          WithOptions(): array
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return array
     */
    public static function withOptions(array $options): array
    {
        return [static::class, $options];
    }
    /**
     * =====================================================================
     *          Configure(): void
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return void
     */
    final public function configure(array $options): void
    {
        if ($this->optionsResolved)
        {
            return;
        }
        $reslover = new optionsResolver();
        $reslover->setDefaults($this->defaultOptions());
        $this->resolvedOptions = $reslover->resolve($options);
        $this->optionsResolved = true;
        $this->OnAfterConfigure();
    }
    /**
     * =====================================================================
     *          Option(): mixed
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return mixed
     */
    public function option(string $key): mixed
    {
        if (!$this->optionsResolved) 
        {
            $this->configure([]);
        }
        return $this->ResolvedOptions[$key] ?? NULL;
    }

    /**
     * =====================================================================
     *          DefaultOptions(): array
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return array
     */
    private function defaultOptions(): array
    {
        return [];
    }

    /**
     * =====================================================================
     *          OnAfterConfigure(): void
     * =====================================================================
     * 
     * 
     * 
     * 
     * Summary of GetDropReason
     * @return void
     */
    private function onAfterConfigure(): void
    {

    }
}