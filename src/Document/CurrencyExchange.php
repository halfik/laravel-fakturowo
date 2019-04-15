<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class CurrencyExchange
 * @package Halfik\Fakturowo\Document
 */
class CurrencyExchange
{
    protected $supportedCurrencies = [
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

    /** @var string */
    protected $exchangeTo;

    /** @var int */
    protected $source;

    /** @var \DateTimeImmutable|null */
    protected $exchangeDate;

    /** @var float|null */
    protected $exchangeCourse;

    /**
     * CurrencyExchange constructor.
     * @param int $source
     * @param \DateTimeImmutable|null $exchangeDate
     * @param float|null $exchangeCourse
     */
    protected function __construct(int $source, ?\DateTimeImmutable $exchangeDate, ?float $exchangeCourse)
    {
        $this->source = $source;
        $this->exchangeDate = $exchangeDate;
        $this->exchangeCourse = $exchangeCourse;
    }

    /**
     * @param string $currencyIso
     * @return CurrencyExchange
     */
    public function exchangeTo(string $currencyIso): self
    {
        if (in_array($currencyIso, $this->supportedCurrencies)) {
            throw new \InvalidArgumentException("$currencyIso is not supported");
        }

        $this->exchangeTo = $currencyIso;
        return $this;
    }

    /**
     * @param \DateTimeImmutable $exchangeDate
     * @return static
     */
    public static function sourceNBP(\DateTimeImmutable $exchangeDate)
    {
        return new static(0, $exchangeDate, null);
    }

    /**
     * @param float $exchangeCourse
     * @return static
     */
    public static function sourceOwn(float $exchangeCourse)
    {
        return new static(1, null, $exchangeCourse);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'dokument_przelicz_walute' => $this->exchangeTo,
            'dokument_rodzaj_kursu' => $this->source,
        ];

        if ($this->exchangeDate) {
            $data['dokument_data_wymiany'] = $this->exchangeDate->format('d-m-Y');
        }
        
         if ($this->exchangeCourse) {
             $data['dokument_kurs_wymiany'] = $this->exchangeCourse;
         }

        return $data;
    }
}
