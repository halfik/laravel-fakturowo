<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class SecondLanguage
 * @package Halfik\Fakturowo\Document
 */
class SecondLanguage extends Language
{
    /**
     * Language constructor.
     * @param int $id
     */
    protected function __construct(int $id)
    {
        parent::__construct($id+1);
    }
}
