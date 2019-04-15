<?php

namespace Halfik\Fakturowo\Document\Payment;

/**
 * Class PaymentMethod
 * @package Halfik\Fakturowo\Document\Payment
 */
class PaymentMethod
{
    /** @var int */
    protected $id;

    /** @var bool */
    protected $show;

    /** @var array  */
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
     * @param bool $show
     */
    protected function __construct(int $id, bool $show = true)
    {
        $this->id = $id;
        $this->show = $show;
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function bankTransfer(bool $show): self
    {
        return new static(0, $show);
    }

    /**
     * @param int $days
     * @param bool $show
     * @return PaymentMethod
     */
    public static function bankTransferDays(int $days, bool $show): self
    {
        if (!array_key_exists($days, static::$bankTransferDaysMap)) {
            throw new \InvalidArgumentException("Unsupported value of days");
        }

        return new static(static::$bankTransferDaysMap[$days], $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function onDelivery(bool $show): self
    {
       return new static(12, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function cash(bool $show): self
    {
        return new static(13, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidBankTransfer(bool $show): self
    {
        return new static(14, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidCash(bool $show): self
    {
        return new static(15, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidPayPal(bool $show): self
    {
        return new static(16, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidDotPay(bool $show): self
    {
        return new static(17, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidPayU(bool $show): self
    {
        return new static(18, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidCashBill(bool $show): self
    {
        return new static(19, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paidPrzelewy24(bool $show): self
    {
        return new static(20, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paymentCard(bool $show): self
    {
        return new static(21, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function barter(bool $show): self
    {
        return new static(22, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function check(bool $show): self
    {
        return new static(23, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function exchangeBill(bool $show): self
    {
        return new static(24, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function compensation(bool $show): self
    {
        return new static(25, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function creditLetter(bool $show): self
    {
        return new static(26, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function settledWithPrepayment(bool $show): self
    {
        return new static(27, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function paymentTerminal(bool $show): self
    {
        return new static(28, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function loan(bool $show): self
    {
        return new static(29, $show);
    }

    /**
     * @param bool $show
     * @return PaymentMethod
     */
    public static function internetPayment(bool $show): self
    {
        return new static(31, $show);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_zaplata' => $this->id,
            'dokument_pokaz_zaplata' => (int) $this->show,
        ];
    }
}
