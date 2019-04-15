<?php

namespace Halfik\Fakturowo\Document\Payment;

/**
 * Class BankAccount
 * @package Halfik\Fakturowo\Document\Payment
 */
class BankAccount
{
    /** @var string */
    protected $number;

    /** @var bool */
    protected $show;

    /**
     * BankAccount constructor.
     * @param string $number
     * @param bool $show
     */
    public function __construct(string $number, bool $show = true)
    {
        $this->setNumber($number);
        $this->setShow($show);
    }

    /**
     * @return string
     */
    public function number(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return BankAccount
     */
    public function setNumber(string $number): BankAccount
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return bool
     */
    public function show(): bool
    {
        return $this->show;
    }

    /**
     * @param bool $show
     * @return BankAccount
     */
    public function setShow(bool $show): BankAccount
    {
        $this->show = $show;
        return $this;
    }


}
