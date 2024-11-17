<?php 


namespace Http;

use Contracts\IClient\IClient;
use PHPUnit\Framework\Assert;

class FakeClient implements IClient
{
    private array $sentRequestUrls = [];

    /**
     * ===============================================================================================
     *  pool(array $Requests, ?callable $OnFullFilled = NULL, ?callable $OnRefected = NULL): void
     * ===============================================================================================
     *  обрабатывает массив запросов и вызывает заданные обработчики 
     *  для успещных и неуспезных запросов
     * 
     * @param array $Requests
     * @param callable $OnFullFilled
     * @param callable $OnRefected
     * @return void
     */
    public function pool(array $requests, ?callable $onFullFilled = NULL, ?callable $onRefected = NULL): void
    {
        foreach ($requests as $request)
        {
            $this->sentRequestUrls[] = $request->getUri();

            if (NULL !== $onFullFilled)
            {
                $response = new Response(new GuzzleResponse(), $requests);
                $onFullFilled($response);
            }
        }
    }



    /**
     * =====================================================================
     *         asserRequestWasSent(Request $Request): void
     * =====================================================================
     *  проверяет был ли запрос отправлен
     *  
     * @param Request $request
     * @return void
     */
    public function asserRequestWasSent(Request $request): void
    {
        $url = $request->getUri();
        Assert::assertContains($request->getUri(), $this->sentRequestUrls, "Expected Request To [{$url}] Was Not Sent!");
        
    }


    /**
     * =====================================================================
     *         asserRequestWasNoSent(Request $request): void
     * =====================================================================
     *  проверяет что запрос не был отправлен
     * 
     * @param Request $Request
     * @return void
     */
    public function asserRequestWasNoSent(Request $request): void
    {
        $url = $request->getUri();
        Assert::assertContains($url, $this->sentRequestUrls, "Unexpected Request Sent To {$url}");
    }
}