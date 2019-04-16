<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class Currency
 * @package Halfik\Fakturowo\Document
 */
class Currency
{
    protected static $supportedCurrencies = [
        'PLN', 'EUR', 'USD', 'GBP', 'CHF', 'CAD', 'AUD', 'JPY', 'THB', 'HKD', 'NZD', 'SGD', 'HUF', 'UAH',
        'CZK', 'DKK', 'ISK', 'NOK', 'SEK', 'HRK', 'RON', 'BGN', 'TRY', 'ILS', 'CLP', 'PHP', 'MXN', 'ZAR', 'BRL',
        'MYR', 'RUB', 'IDR', 'INR', 'KRW', 'CNY', 'XDR', 'AED', 'AFN', 'MGA', 'PAB', 'ETB', 'VEF', 'BOB', 'CRC',
        'SVC', 'NIO', 'GMD', 'MKD', 'DZD', 'BHD', 'IQD', 'JOD', 'KWD', 'LYD', 'RSD', 'TND', 'MAD', 'STD', 'BSD',
        'BBD', 'BZD', 'BND', 'FJD', 'GYD', 'JMD', 'LRD', 'NAD', 'SRD', 'TTD', 'XCD', 'SBD', 'VND', 'AMD', 'CVE',
        'AWG', 'BIF', 'XOF', 'XAF', 'XPF', 'DJF', 'GNF', 'KMF', 'CDF', 'RWF', 'EGP', 'GIP', 'LBP', 'SDG', 'SYP',
        'GHS', 'HTG', 'PYG', 'ANG', 'PGK', 'LAK', 'MWK', 'ZMW', 'AOA', 'MMK', 'GEL', 'MDL', 'ALL', 'HNL', 'SLL',
        'SZL', 'LSL', 'AZN', 'MZN', 'NGN', 'ERN', 'TWD', 'PEN', 'MRO', 'TOP', 'MOP', 'ARS', 'DOP', 'COP', 'UYU',
        'BWP', 'GTQ', 'IRR', 'YER', 'QAR', 'OMR', 'SAR', 'KHR', 'BYN', 'LKR', 'MVR', 'MUR', 'NPR', 'PKR', 'SCR',
        'KGS', 'TJS', 'UZS', 'KES', 'SOS', 'TZS', 'UGX', 'BDT', 'WST', 'KZT', 'MNT', 'VUV', 'BAM', 'SSP', 'TMT',
        'CUP', 'STN', 'MRU', 'VES',
    ];


    /** @var int */
    protected $id;

    /** @var string */
    protected $iso;

    public function __construct(string  $iso)
    {
        if (!static::isSupported($iso)) {
            throw new \InvalidArgumentException("$iso is not supported");
        }

        $this->iso = $iso;
        $this->id = array_search($iso, self::$supportedCurrencies);
    }

    /**
     * @param string $iso
     * @return bool
     */
    public static function isSupported(string $iso): bool
    {
        return in_array($iso, self::$supportedCurrencies);
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function iso(): string
    {
        return $this->iso;
    }
}
