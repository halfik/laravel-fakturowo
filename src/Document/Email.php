<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class Email
 * @package Halfik\Fakturowo\Document
 */
class Email
{
    /** @var string */
    protected $address;
    /** @var string */
    protected $title;
    /** @var string */
    protected $content;

    /**
     * Email constructor.
     * @param string $address
     * @param string $title
     * @param string $content
     */
    public function __construct(string $address, string $title, string $content)
    {
        $this->address = $address;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_email' => $this->address,
            'dokument_tytul' => $this->title,
            'dokument_tresc' => $this->content,
        ];
    }
}