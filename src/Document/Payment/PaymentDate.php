<?php

namespace Halfik\Fakturowo\Document\Payment;

/**
 * Class PaymentDate
 * @package Halfik\Fakturowo\Document\Payment
 */
class PaymentDate
{
    /** @var \DateTimeImmutable */
    protected $date;
    /** @var bool */
    protected $show;
    /** @var int */
    protected $designation;

    /**
     * PaymentDate constructor.
     * @param \DateTimeImmutable $date
     * @param bool $show
     * @param int $designation
     */
    protected function __construct(\DateTimeImmutable $date, bool $show, int $designation)
    {
        $this->date = $date;
        $this->show = $show;
        $this->designation = $designation;
    }

    /**
     * @param \DateTimeImmutable $date
     * @param bool $show
     * @return PaymentDate
     */
    public static function paymentDeadline(\DateTimeImmutable $date, bool $show): self
    {
        return new static($date, $show, 0);
    }

    /**
     * @param \DateTimeImmutable $date
     * @param bool $show
     * @return PaymentDate
     */
    public static function paymentDate(\DateTimeImmutable $date, bool $show): self
    {
        return new static($date, $show, 1);
    }

    /**
     * @param \DateTimeImmutable $date
     * @param bool $show
     * @return PaymentDate
     */
    public static function paymentReceiptDate(\DateTimeImmutable $date, bool $show): self
    {
        return new static($date, $show, 2);
    }

    /**
     * @param \DateTimeImmutable $date
     * @param bool $show
     * @return PaymentDate
     */
    public static function paymentFinaltDate(\DateTimeImmutable $date, bool $show): self
    {
        return new static($date, $show, 3);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_data_p' => $this->date->format('d-m-Y'),
            'dokument_pokaz_data_p' => (int) $this->show,
            'dokument_data_p_oznaczenie' => $this->designation,
        ];
    }
}

