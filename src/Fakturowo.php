<?php

namespace Halfik\Fakturowo;

use GuzzleHttp\Client;

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
     * @param $method
     * @param $url
     * @param array $data
     * @return mixed
     */
    private function execute($method, $url, array $data = [])
    {
        $response = $this->client->request($method, $url, self::setData($method, $data));

        $status_code = $response->getStatusCode();
        $response_body = json_decode($response->getBody()->getContents());

        return $response_body;
    }

    /**
     * Get the API URL to use
     * @return string
     */
    private function getUrl()
    {
        return  $this->config['api.url'];
    }

    /**
     * Get api key
     * @return string
     */
    private function getActiveKey()
    {
        return  $this->config['api.key'];
    }
}
