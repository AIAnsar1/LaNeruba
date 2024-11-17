<?php

namespace Processor;

use Contracts\{IItemProcessor, IItem};
use Utils\Configurable\Configurable;
use phpUnit\Framework\Assert;

class FakeProcessor implements IItemProcessor
{
    use Configurable;
    private array $Calls = [];

    public function ProcessItem(IItem $Item): IItem
    {
        $this->Calls[] = $Item->All();
        return $Item;
    }
    public function AssertCallWith(IItem $Item): void
    {
        Assert::assertContains($Item->All(), $this->Calls, "Processor was not called  with expected item");
    }
    public function AssertNotCalledWith(IItem $Item): void
    {
        Assert::assertNotContains($Item->All(), $this->Calls, "Processor got unexpected call with item");
    }
    public function AssertNotCalled(): void
    {
        Assert::assertEmpty($this->Calls, \sprintf("Expected Processor To not have been called at all. Was called { %s } time(s)", \count($this->Calls)));
    }
}