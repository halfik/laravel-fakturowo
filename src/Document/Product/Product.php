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
     * Product constructor.
     * @param string $name
     * @param Quantity $quantity
     * @param Price $price
     */
    public function __construct(string $name, Quantity $quantity, Price $price)
    {
        $this->setName($name);
        $this->setQuantity($quantity);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
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
     * @return self
     */
    public function setQuantity(Quantity $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
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
     * @return self
     */
    public function setPrice(Price $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param string $postFix
     * @return array
     */
    public function toArray(string $postFix = ''): array
    {
        $data = [
            "produkt_nazwa$postFix" => $this->name(),
        ];

        $data = array_merge($data, $this->quantity()->toArray($postFix));
        $data = array_merge($data, $this->price()->toArray($postFix));

        return $data;
    }
}
