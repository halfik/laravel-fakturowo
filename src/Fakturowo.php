<?php

namespace Halfik\Fakturowo;

use GuzzleHttp\Client;
use Halfik\Fakturowo\Document\Document;

/**
 * Class Fakturowo
 * @package Halfik\Fakturowo
 */
class Fakturowo
{
    /** @var Client  */
    private $client;
    private $config;

    /**
     * Fakturowo constructor.
     */
    public function __construct()
    {
        $this->config = config('fakturowo');
        // Setting http_errors to false since guzzle explodes for anything not 200
        $client = new Client([
            'base_uri' => $this->getUrl(),
            'auth' => ['api', $this->getActiveKey()],
            'cookies' => true,
            'allow_redirects' => true,
            'http_errors' => false,
            "headers" => [
                "User-Agent" => "MCv3.0 / PHP",
                "Accept" => "application/json"
            ]
        ]);
        $this->client = $client;
    }

    /**
     * @param Document $document
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function newDocument(Document $document): string
    {
        $response = $this->client->request('POST', '', $this->prepareData($document, 1));
        dd($response);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param Document $document
     * @param int $status
     * @return array
     */
    protected function prepareData(Document $document, int $status): array
    {
        $data = $document->toArray();

        $data['api_id'] = $this->getActiveKey();
        $data['api_status'] = $status;
        $data['api_kodowanie'] = $this->config['api']['encoding'];

        return $data;
    }

    /**
     * Get the API URL to use
     * @return string
     */
    private function getUrl()
    {
        return  $this->config['api']['url'];
    }

    /**
     * Get api key
     * @return string
     */
    private function getActiveKey()
    {
        return  $this->config['api']['key'];
    }
}
