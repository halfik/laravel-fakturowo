<?php

namespace Halfik\Fakturowo\Document\Participant;


/**
 * Class Seller
 * @package Halfik\Fakturowo\Document\Participant
 */
class Seller extends Participant
{
    /**
     * @inheritdoc
     */
    protected function prefix(): string
    {
        return 'sprzedawca';
    }
}
