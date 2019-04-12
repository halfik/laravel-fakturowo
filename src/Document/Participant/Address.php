<?php

namespace Halfik\Fakturowo\Document\Participant;

/**
 * Class Address
 * @package Halfik\Fakturowo\Document\Participant
 */
class Address
{
    /** @var string */
    protected $country;
    /** @var string */
    protected $city;
    /** @var string */
    protected $zipCode;
    /** @var string */
    protected $street;

    /**
     * Address constructor.
     * @param string $country
     * @param string $city
     * @param string $zipCode
     * @param string $street
     */
    public function __construct(string $country, string $city, string $zipCode, string $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->street = $street;
    }

    /**
     * @param string $prefix
     * @return array
     */
    public function toArray(string $prefix): array
    {
        return [
            sprintf('%s_ulica', $prefix) => $this->street,
            sprintf('%s_miasto', $prefix) => $this->street,
            sprintf('%s_kod', $prefix) => $this->street,
            sprintf('%s_panstwo', $prefix) => $this->street,
        ];
    }
}
