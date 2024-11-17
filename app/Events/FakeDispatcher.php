<?php

namespace App\Events;

use PHPUnit\Framework\Assert;
use Symfony\Component\EventDispatcher\EventDispatcher;

class FakeDispatcher extends EventDispatcher
{
    private array $dispatcherEvents = [];

    /**
     * =====================================================================
     *     dispatch(object $event, ?string $eventName = NULL): object
     * =====================================================================
     * 
     * отправляем событие и сохраняем его для дальнейшей проверки
     * 
     * 
     * 
     * 
     * @param ?string $eventName
     * @param object $event
     * @return object
     */

    public function dispatch(object $event, ?string $eventName = NULL): object
    {
        $eventName ??= $event::class;
        parent::dispatch($event, $eventName);
        $this->dispatcherEvents[$eventName][] = $event;
        return $event;
    }


    /**
     * ========================================================================
     *  assertDispatched(string $eventName, ?callable $callback = NULL): void
     * ========================================================================
     * 
     * проверяем что событие отправлено
     * 
     * 
     * 
     * 
     * @param string $eventName
     * @param ?callable $callback
     * @return void
     */
    public function assertDispatched(string $eventName, ?callable $callback = NULL): void
    {
        Assert::assertArrayHasKey($eventName, $this->dispatcherEvents);

        if (NULL !== $callback)
        {
            foreach ($this->dispatcherEvents[$eventName] as $event)
            {
                if ($callback($event))
                {
                    return;
                }
            }
            Assert::fail("Event was not dispatched with correct payload");
        }
    }


    /**
     * ========================================================================
     *  assertNotDispatched(string $eventName): void
     * ========================================================================
     * 
     * проверяем что событие не было отправлена
     * 
     * 
     * 
     * 
     * @param string $eventName
     * @return void
     */
    public function assertNotDispatched(string $eventName): void
    {
        Assert::assertArrayNotHasKey($eventName, $this->dispatcherEvents);
    }


     /**
     * ========================================================================
     *  listen(string $eventName, callable $listineer): void
     * ========================================================================
     * 
     * добавляем слушатель для указанного события
     * 
     * 
     * 
     * 
     * @param string $eventName
     * @param callable $listineer
     * @return void
     */
    
    public function listen(string $eventName, callable $listineer): void
    {
        $this->addListener($eventName, $listineer);
    }
}
