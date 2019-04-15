<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class PaymentMethod
 * @package Halfik\Fakturowo\Document
 */
class PaymentMethod
{
    /** @var int */
    protected $id;

    protected static $bankTransferDaysMap = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 36,
        9 => 37,
        10 => 38,
        11 => 39,
        12 => 40,
        13 => 41,
        14 => 8,
        21 => 9,
        28 => 42,
        30 => 10,
        35 => 32,
        40 => 33,
        43 => 43,
        45 => 30,
        50 => 34,
        55 => 35,
        60 => 11,
        65 => 44
    ];


    /**
     * PaymentMethod constructor.
     * @param int $id
     */
    protected function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return PaymentMethod
     */
    public static function bankTransfer(): self
    {
        return new static(0);
    }

    /**
     * @param int $days
     * @return PaymentMethod
     */
    public static function bankTransferDays(int $days): self
    {
        if (!array_key_exists($days, static::$bankTransferDaysMap)) {
            throw new \InvalidArgumentException("Unsupported value of days");
        }

        return new static(static::$bankTransferDaysMap[$days]);
    }

    /**
     * @return PaymentMethod
     */
    public static function onDelivery(): self
    {
       return new static(12);
    }

    /**
     * @return PaymentMethod
     */
    public static function cash(): self
    {
        return new static(13);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidBankTransfer(): self
    {
        return new static(14);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidCash(): self
    {
        return new static(15);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidPayPal(): self
    {
        return new static(16);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidDotPay(): self
    {
        return new static(17);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidPayU(): self
    {
        return new static(18);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidCashBill(): self
    {
        return new static(19);
    }

    /**
     * @return PaymentMethod
     */
    public static function paidPrzelewy24(): self
    {
        return new static(20);
    }

    /**
     * @return PaymentMethod
     */
    public static function paymentCard(): self
    {
        return new static(21);
    }

    /**
     * @return PaymentMethod
     */
    public static function barter(): self
    {
        return new static(22);
    }

    /**
     * @return PaymentMethod
     */
    public static function check(): self
    {
        return new static(23);
    }

    /**
     * @return PaymentMethod
     */
    public static function exchangeBill(): self
    {
        return new static(24);
    }

    /**
     * @return PaymentMethod
     */
    public static function compensation(): self
    {
        return new static(25);
    }

    /**
     * @return PaymentMethod
     */
    public static function creditLetter(): self
    {
        return new static(26);
    }

    /**
     * @return PaymentMethod
     */
    public static function settledWithPrepayment(): self
    {
        return new static(27);
    }

    /**
     * @return PaymentMethod
     */
    public static function paymentTerminal(): self
    {
        return new static(28);
    }

    /**
     * @return PaymentMethod
     */
    public static function loan(): self
    {
        return new static(29);
    }

    /**
     * @return PaymentMethod
     */
    public static function internetPayment(): self
    {
        return new static(31);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_zaplata' => $this->id,
        ];
    }
}
