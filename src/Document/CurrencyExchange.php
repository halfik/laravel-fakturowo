<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class CurrencyExchange
 * @package Halfik\Fakturowo\Document
 */
class CurrencyExchange
{
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
     * @param string $exchangeToCurrency
     * @param \DateTimeImmutable|null $exchangeDate
     * @param float|null $exchangeCourse
     */
    protected function __construct(
        int $source,
        string $exchangeToCurrency,
        ?\DateTimeImmutable $exchangeDate,
        ?float $exchangeCourse
    )
    {
        $this->source = $source;
        $this->exchangeDate = $exchangeDate;
        $this->exchangeCourse = $exchangeCourse;
        $this->exchangeTo($exchangeToCurrency);
    }

    /**
     * @param string $currencyIso
     * @return CurrencyExchange
     */
    protected function exchangeTo(string $currencyIso): self
    {
        if (!Currency::isSupported($currencyIso)) {
            throw new \InvalidArgumentException("$currencyIso is not supported");
        }

        $this->exchangeTo = $currencyIso;
        return $this;
    }

    /**
     * @param \DateTimeImmutable $exchangeDate
     * @param string $exchangeToCurrency
     * @return static
     */
    public static function sourceNBP(\DateTimeImmutable $exchangeDate, string $exchangeToCurrency)
    {
        return new static(0, $exchangeToCurrency, $exchangeDate, null);
    }

    /**
     * @param float $exchangeCourse
     * @param string $exchangeToCurrency
     * @return static
     */
    public static function sourceOwn(float $exchangeCourse, string $exchangeToCurrency)
    {
        return new static(1, $exchangeToCurrency, null, $exchangeCourse);
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
