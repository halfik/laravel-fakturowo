<?php

namespace Halfik\Fakturowo\Document\Product;

/**
 * Class Product
 * @package Halfik\Fakturowo\Document\Product
 */
class Product
{
    /** @var string */
    protected $name;

    /** @var Quantity */
    protected $quantity;

    /** @var Price */
    protected $price;

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Quantity
     */
    public function quantity(): Quantity
    {
        return $this->quantity;
    }

    /**
     * @param Quantity $quantity
     */
    public function setQuantity(Quantity $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return Price
     */
    public function price(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return Product
     */
    public function setPrice(Price $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'produkt_nazwa' => $this->name(),
        ];

        $data = array_merge($data, $this->quantity()->toArray());
        $data = array_merge($data, $this->price()->toArray());

        return $data;
    }
}
