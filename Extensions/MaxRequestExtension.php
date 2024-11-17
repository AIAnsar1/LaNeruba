<?php


namespace Extensions;

use Contracts\IExtension;
use Events\{RequestScheduling, RequestSending};
use Utils\Configurable\Configurable;



class MaxRequestExtension implements IExtension
{
    use Configurable;

    public static function getSubscribedEvents(): array
    {
        return [
            RequestSending::NAME => ['onRequestSending', 10000],
            RequestScheduling::NAME => ['onRequestScheduling', 0],
        ];
    }


    public function onRequestSending(RequestSending $request)
    {

    }

    public function onRequestScheduling(RequestScheduling $request)
    {
        
    }


    private function dropRequestIfLimitReached(RequestScheduling|RequestSending $event)
    {
        if ($this->option('limit') <= $this->sentRequests)
        {
            $event->request = $event->request->drop("Reached Maximum Request Limit of {$this->option('limit')}");
        }
    }

    private function defaultOptions(): array
    {
        return [
            'limit' => 10,
        ];
    }
}