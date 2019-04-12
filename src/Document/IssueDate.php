<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class IssueDate
 * @package Halfik\Fakturowo\Document
 */
class IssueDate extends \DateTimeImmutable
{
    /** @var bool */
    protected $show;

    /**
     * IssueDate constructor.
     * @param string $time
     * @param null $timezone
     * @param bool $show
     * @throws \Exception
     */
    public function __construct($time = "now", $timezone = NULL, bool $show = false)
    {
        parent::__construct($time, $timezone);
        $this->show = $show;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_data_w' => $this->format('d-m-Y'),
            'dokument_pokaz_data_w' => (int) $this->show
        ];
    }
}
