<?php

namespace Halfik\Fakturowo\Document\Product;

/**
 * Class Quantity
 * @package Halfik\Fakturowo\Document\Product
 */
class Quantity
{
    /** @var int */
    protected $quantity;
    /** @var int */
    protected $unit;

    /**
     * Quantity constructor.
     * @param int $quantity
     * @param int $unit
     */
    protected function __construct(int $quantity, int $unit)
    {
        $this->quantity = $quantity;
        $this->unit = $unit;
    }
    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function service(int $quantity): self
    {
        return new static($quantity, 0);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function piece(int $quantity): self
    {
        return new static($quantity, 1);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function at(int $quantity): self
    {
        return new static($quantity, 2);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function gj(int $quantity): self
    {
        return new static($quantity, 3);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function mw(int $quantity): self
    {
        return new static($quantity, 4);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function day(int $quantity): self
    {
        return new static($quantity, 6);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function hour(int $quantity): self
    {
        return new static($quantity, 7);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function gr(int $quantity): self
    {
        return new static($quantity, 8);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function group(int $quantity): self
    {
        return new static($quantity, 9);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function h(int $quantity): self
    {
        return new static($quantity, 10);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function hl(int $quantity): self
    {
        return new static($quantity, 11);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function kW(int $quantity): self
    {
        return new static($quantity, 12);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function kWh(int $quantity): self
    {
        return new static($quantity, 13);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function kg(int $quantity): self
    {
        return new static($quantity, 14);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function km(int $quantity): self
    {
        return new static($quantity, 15);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function kpl(int $quantity): self
    {
        return new static($quantity, 16);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function course(int $quantity): self
    {
        return new static($quantity, 17);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function l(int $quantity): self
    {
        return new static($quantity, 18);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function m(int $quantity): self
    {
        return new static($quantity, 19);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function m2(int $quantity): self
    {
        return new static($quantity, 20);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function m3(int $quantity): self
    {
        return new static($quantity, 21);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function mb(int $quantity): self
    {
        return new static($quantity, 22);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function month(int $quantity): self
    {
        return new static($quantity, 23);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function min(int $quantity): self
    {
        return new static($quantity, 24);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function ml(int $quantity): self
    {
        return new static($quantity, 25);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function mp(int $quantity): self
    {
        return new static($quantity, 26);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function circumference(int $quantity): self
    {
        return new static($quantity, 27);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function package(int $quantity): self
    {
        return new static($quantity, 28);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function pair(int $quantity): self
    {
        return new static($quantity, 29);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function point(int $quantity): self
    {
        return new static($quantity, 30);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function roll(int $quantity): self
    {
        return new static($quantity, 31);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function page(int $quantity): self
    {
        return new static($quantity, 32);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function word(int $quantity): self
    {
        return new static($quantity, 33);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function ton(int $quantity): self
    {
        return new static($quantity, 34);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function sem(int $quantity): self
    {
        return new static($quantity, 35);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function freight(int $quantity): self
    {
        return new static($quantity, 36);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function person(int $quantity): self
    {
        return new static($quantity, 37);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function rbg(int $quantity): self
    {
        return new static($quantity, 38);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function mg(int $quantity): self
    {
        return new static($quantity, 39);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function lumpSum(int $quantity): self
    {
        return new static($quantity, 40);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function share(int $quantity): self
    {
        return new static($quantity, 41);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function container(int $quantity): self
    {
        return new static($quantity, 42);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function procedure(int $quantity): self
    {
        return new static($quantity, 43);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function cm(int $quantity): self
    {
        return new static($quantity, 44);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function MWh(int $quantity): self
    {
        return new static($quantity, 45);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function ha(int $quantity): self
    {
        return new static($quantity, 46);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function quarter(int $quantity): self
    {
        return new static($quantity, 47);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function yard(int $quantity): self
    {
        return new static($quantity, 48);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function fullTime(int $quantity): self
    {
        return new static($quantity, 49);
    }

    /**
     * @param int $quantity
     * @return Quantity
     */
    public static function subscription(int $quantity): self
    {
        return new static($quantity, 50);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'produkt_jm' => $this->unit,
            'produkt_ilosc' => $this->quantity,
        ];
    }
}
