<?php

namespace Halfik\Fakturowo\Document\Payment;

/**
 * Class Payment
 * @package Halfik\Fakturowo\Document\Payment
 */
class Payment
{
    /** @var float */
    protected $paidAmount;
    /** @var bool */
    protected $showPaidAmount;
    /** @var int */
    protected $paidDesignation;

    /** @var PaymentDate */
    protected $paymentDate;
    /** @var PaymentDeadline|null */
    protected $paymentDeadline;

    /** @var array */
    protected $bankAccounts;

    /** @var string */
    protected $desc;
    /** @var bool */
    protected $showDesc;

    /** @var PaymentMethod */
    protected $method;
    /** @var PaymentStatus */
    protected $status;

    /**
     * Payment constructor.
     * @param float $paidAmount
     * @param PaymentMethod $method
     * @param PaymentStatus $status
     * @param PaymentDate $date
     * @param PaymentDeadline|null $deadline
     */
    public function __construct(
        float $paidAmount,
        PaymentMethod $method,
        PaymentStatus $status,
        PaymentDate $date,
        ?PaymentDeadline $deadline
    )
    {
        $this->method = $method;
        $this->status = $status;
        $this->setPaidAmount($paidAmount, false);
        $this->markAsPaid();
        $this->setDescription('', false);
        $this->setPaymentDate($date);
        $this->setPaymentDeadline($deadline);
        $this->bankAccounts = [];
    }


    /**
     * @param BankAccount $account
     * @return Payment
     * @throws \Exception
     */
    public function addBankAccount(BankAccount $account): self
    {
        if(count($this->bankAccounts) == 4) {
            throw new \Exception('Max 4 accounts are allowed');
        }

        $this->bankAccounts[] = $account;
        return $this;
    }

    /**
     * @return PaymentDeadline|null
     */
    public function paymentDeadline(): ?PaymentDeadline
    {
        return $this->paymentDeadline;
    }

    /**
     * @param PaymentDeadline|null $paymentDeadline
     * @return Payment
     */
    public function setPaymentDeadline(?PaymentDeadline $paymentDeadline): Payment
    {
        $this->paymentDeadline = $paymentDeadline;
        return $this;
    }

    /**
     * @return PaymentDate
     */
    public function paymentDate(): PaymentDate
    {
        return $this->paymentDate;
    }

    /**
     * @param PaymentDate $paymentDate
     * @return Payment
     */
    public function setPaymentDate(PaymentDate $paymentDate): Payment
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @param string $desc
     * @param bool $show
     * @return Payment
     */
    public function setDescription(string $desc, bool $show = true): Payment
    {
        $this->desc = $desc;
        $this->showDesc = $show;
        return $this;
    }

    /**
     * @return Payment
     */
    public function markAsAdvance(): self
    {
        $this->paidDesignation = 1;
        return $this;
    }

    /**
     * @return Payment
     */
    public function markAsPaid(): self
    {
        $this->paidDesignation = 0;
        return $this;
    }

    /**
     * @return float
     */
    public function paidAmount(): float
    {
        return $this->paidAmount;
    }

    /**
     * @param float $paidAmount
     * @param bool $show
     * @return self
     */
    public function setPaidAmount(float $paidAmount, bool $show = true): self
    {
        $this->paidAmount = $paidAmount;
        $this->showPaidAmount = $show;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = array_merge(
            [
                'dokument_zaplacono' => $this->paidAmount(),
                'dokument_pokaz_zaplacono' => (int) $this->showPaidAmount,
                'dokument_zaplacono_oznaczenie' => $this->paidDesignation,
                'dokument_zaplacono_opis' => $this->desc,
                'dokument_pokaz_zaplacono_opis' => (int) $this->showDesc,
            ],
            $this->method->toArray(),
            $this->status->toArray(),
            $this->paymentDate()->toArray()
        );

        // payment deadline
        if ($this->paymentDeadline()) {
            $data = array_merge($data,   $this->paymentDeadline()->toArray());
        }

        /**
         * @var int $i
         * @var BankAccount $bankAccount
         */
        foreach ($this->bankAccounts as $i=>$bankAccount) {
            $k1 = 'dokument_konto';
            $k2 = 'dokument_pokaz_konto';
            if ($i > 0) {
                $k1 .= '_'. ($i+1);
            }

            $data[$k1] = $bankAccount->number();
            $data[$k2] = (int) $bankAccount->show();
        }

        return$data;
    }
}
