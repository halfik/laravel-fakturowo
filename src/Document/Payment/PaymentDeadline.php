<?php

namespace Halfik\Fakturowo\Document\Payment;

/**
 * Class PaymentDeadline
 * @package Halfik\Fakturowo\Document\Payment
 */
class PaymentDeadline
{
    /** @var int */
    protected $days;
    /** @var bool */
    protected $show;

    /**
     * PaymentDeadline constructor.
     * @param int $days
     * @param bool $show
     */
    public function __construct(int $days, bool $show)
    {
        $this->days = $days;
        $this->show = $show;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_termin' => $this->days,
            'dokument_pokaz_termin' => (int) $this->show,
        ];
    }
}
