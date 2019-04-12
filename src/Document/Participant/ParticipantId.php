<?php

namespace Halfik\Fakturowo\Document\Participant;

/**
 * Class ParticipantId
 * @package Halfik\Fakturowo\Document\Participant
 */
class ParticipantId
{
    /** @var string */
    protected $type;
    /** @var string */
    protected $value;

    /**
     * ParticipantId constructor.
     * @param string $type
     * @param string $value
     */
    private function __construct(string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * NIP id
     * @param string $nip
     * @return ParticipantId
     */
    public static function nip(string $nip): self
    {
        return new static('nip', $nip);
    }

    /**
     * VAT EU
     * @param string $vatEu
     * @return ParticipantId
     */
    public static function vatEu(string $vatEu): self
    {
        return new static('vatEu', $vatEu);
    }

    /**
     * Regon
     * @param string $regon
     * @return ParticipantId
     */
    public static function regon(string $regon): self
    {
        return new static('regon', $regon);
    }

    /**
     * Pesel id
     * @param string $pesel
     * @return ParticipantId
     */
    public static function pesel(string $pesel): self
    {
        return new static('pesel', $pesel);
    }

    /**
     * @param string $prefix
     * @return array
     */
    public function toArray(string $prefix): array
    {
        $key = sprintf('%s_%s', $prefix, $this->type);
        return [
            $key => $this->value,
        ];
    }
}
