<?php

namespace Halfik\Fakturowo\Document\Participant;

/**
 * Class Signature
 * @package Halfik\Fakturowo\Document\Participant
 */
class Signature
{
    /** @var string */
    protected $signature;
    /** @var bool */
    protected $show;

    /**
     * Signature constructor.
     * @param string $signature
     * @param bool $show
     */
    public function __construct(string $signature, bool $show = true)
    {
        $this->signature = $signature;
        $this->show = $show;
    }

    /**
     * @param string $prefix
     * @return array
     */
    public function toArray(string $prefix): array
    {
        return [
            sprintf('%s_podpis', $prefix) => $this->signature,
            sprintf('%s_pokaz_podpis', $prefix) => (int) $this->show,
        ];
    }
}
