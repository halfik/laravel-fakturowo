<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class SalesDate
 * @package Halfik\Fakturowo\Document
 */
class SalesDate
{
    /** @var bool */
    protected $show;

    /** @var int */
    protected $type;

    /** @var \DateTimeImmutable */
    protected $dateTime;

    /**
     * SalesDate constructor.
     * @param int $type
     * @param string $time
     * @param null $timezone
     * @param bool $show
     * @throws \Exception
     */
    protected function __construct(int $type, $time = "now", $timezone = NULL, bool $show = false)
    {
        $this->dateTime = new \DateTimeImmutable($time, $timezone);
        $this->show = $show;
        $this->type = $type;
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function sales($time = "now", $timezone = NULL): self
    {
        return new static(0, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function service($time = "now", $timezone = NULL): self
    {
        return new static(1, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function goodsDelivery($time = "now", $timezone = NULL): self
    {
        return new static(2, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function serviceEnd($time = "now", $timezone = NULL): self
    {
        return new static(4, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function paymentAdvance($time = "now", $timezone = NULL): self
    {
        return new static(5, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function paymentReceipt($time = "now", $timezone = NULL): self
    {
        return new static(6, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function contractExecution($time = "now", $timezone = NULL): self
    {
        return new static(7, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function goodsReceipt($time = "now", $timezone = NULL): self
    {
        return new static(8, $time, $timezone);
    }

    /**
     * @param string $time
     * @param null $timezone
     * @return SalesDate
     * @throws \Exception
     */
    public static function goodsIssue($time = "now", $timezone = NULL): self
    {
        return new static(9, $time, $timezone);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_data_s' => $this->dateTime->format('d-m-Y'),
            'dokument_pokaz_data_s' => (int) $this->show,
            'dokument_data_s_oznaczenie' => $this->type,
        ];
    }
}
