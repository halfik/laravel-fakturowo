<?php

namespace Halfik\Fakturowo\Document\Participant;

/**
 * Class Buyer
 * @package Halfik\Fakturowo\Document\Participant
 */
class Buyer extends Participant
{
    /**
     * @inheritdoc
     */
    protected function prefix(): string
    {
        return 'nabywca';
    }
}