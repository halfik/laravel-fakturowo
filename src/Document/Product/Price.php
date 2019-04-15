<?php

namespace Halfik\Fakturowo\Document\Product;

/**
 * Class Price
 * @package Halfik\Fakturowo\Document\Product
 */
class Price
{
    /** @var float */
    protected $value;
    /** @var string */
    protected $vatRate;
    /** @var bool */
    private $isGross;

    /**
     * Price constructor.
     * @param float $value
     * @param string $vatRate
     * @param bool $isGross
     */
    private function __construct(float $value, string $vatRate, bool $isGross)
    {
        $this->value = $value;
        $this->vatRate = $vatRate;
        $this->isGross = $isGross;
    }

    /**
     * @param float $value
     * @param string $vatRate
     * @return Price
     */
    public static function net(float $value, string $vatRate): self
    {
        return new static($value, $vatRate, false);
    }
    /**
     * @param float $value
     * @param string $vatRate
     * @return Price
     */
    public static function gross(float $value, string $vatRate): self
    {
        return new static($value, $vatRate, true);
    }

    /**
     * @param string $postFix
     * @return array
     */
    public function toArray(string $postFix = ''): array
    {
        $data = [
            "produkt_stawka_vat$postFix" => $this->vatRate
        ];

        if ($this->isGross) {
            $data["produkt_wartosc_brutto$postFix"] = $this->value;
        } else {
            $data["produkt_cena_netto$postFix"] = $this->value;
        }

        return $data;
    }
}
