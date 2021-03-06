<?php

namespace Halfik\Fakturowo;

use Halfik\Fakturowo\Document\Document;

/**
 * Class Fakturowo
 * @package Halfik\Fakturowo
 */
class Fakturowo
{
    private $config;

    /**
     * Fakturowo constructor.
     */
    public function __construct()
    {
        $this->config = config('fakturowo');
    }

    /**
     * @param Document $document
     * @return string
     */
    public function new(Document $document): string
    {
        $data = $this->prepareData($document);
        $data['api_zadanie'] = 1;

        return $this->execute($data);
    }

    /**
     * @param Document $document
     * @return string
     */
    public function newToBeIssued(Document $document): string
    {
        $data = $this->prepareData($document);
        $data['api_status'] = 1;

        return $this->execute($data);
    }

    /**
     * @param Document $document
     * @return string
     */
    public function newPending(Document $document): string
    {
        $data = $this->prepareData($document);
        $data['api_status'] = 0;

        return $this->execute($data);
    }

    /**
     * @param array $data
     * @return string
     */
    protected function execute(array  $data): string
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $this->getUrl());
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,300);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = explode("\n",$result);
        return $result[1] ?? '';
    }

    /**
     * @param Document $document
     * @return array
     */
    protected function prepareData(Document $document): array
    {
        $data = $document->toArray();

        $data['api_id'] = $this->getActiveKey();
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
