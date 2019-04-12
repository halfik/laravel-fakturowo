<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class IssuePlace
 * @package Halfik\Fakturowo\Document
 */
class IssuePlace
{
    /** @var string */
    protected $name;
    /** @var bool */
    protected $show;

    /**
     * IssuePlace constructor.
     * @param string $name
     * @param bool $show
     */
    public function __construct(string $name, bool  $show = false)
    {
        $this->name = $name;
        $this->show = $show;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function show(): bool
    {
        return $this->show;
    }

    public function toArray(): array
    {
        return [
            'dokument_miejsce' => $this->name(),
            'dokument_pokaz_miejsce' => (int) $this->show(),
        ];
    }
}
