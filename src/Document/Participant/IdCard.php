<?php

namespace Halfik\Fakturowo\Document\Participant;

/**
 * Class IdCard
 * @package Halfik\Fakturowo\Document\Participant
 */
class IdCard
{
    /** @var string */
    protected $number;
    /** @var string */
    protected $series;
    /** @var string */
    protected $issuingAuthority;

    /**
     * IdCard constructor.
     * @param string $number
     * @param string $series
     * @param string $issuingAuthority
     */
    public function __construct(string $number, string $series, string $issuingAuthority)
    {
        $this->number = $number;
        $this->series = $series;
        $this->issuingAuthority = $issuingAuthority;
    }

    /**
     * @param string $prefix
     * @return array
     */
    public function toArray(string $prefix): array
    {
        $key = sprintf('%s_dowod', $prefix);
        return [
            $key => sprintf('%s, %sm %s',
                $this->number,
                $this->series,
                $this->issuingAuthority
            ),
        ];
    }
}
