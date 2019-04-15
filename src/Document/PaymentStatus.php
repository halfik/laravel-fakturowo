<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class PaymentStatus
 * @package Halfik\Fakturowo\Document
 */
class PaymentStatus
{
    /** @var int */
    protected $id;

    /**
     * PaymentStatus constructor.
     * @param int $id
     */
    protected function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return static
     */
    public static function notPaid()
    {
        return new static(0);
    }

    /**
     * @return static
     */
    public static function paid()
    {
        return new static(1);
    }

    /**
     * @return static
     */
    public static function partiallyPai()
    {
        return new static(2);
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_status' => $this->id,
        ];
    }
}
