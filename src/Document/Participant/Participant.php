<?php

namespace Halfik\Fakturowo\Document\Participant;

/**
 * Class Participant
 * @package Halfik\Fakturowo\Document
 */
abstract class Participant
{
    /** @var string */
    protected $name;
    /** @var ParticipantId */
    protected $id;
    /** @var IdCard|null */
    protected $idCard;
    /** @var Address */
    protected $address;
    /** @var string */
    protected $email;
    /** @var string */
    protected $phone;
    /** @var string */
    protected $fax;
    /** @var string */
    protected $www;
    /** @var Signature|null */
    protected $signature;
    /** @var int */
    protected $markedAs;
    /** @var string */
    protected $additionalData;

    /**
     * Participant constructor.
     * @param string $name
     * @param ParticipantId $id
     * @param Address $address
     */
    public function __construct(string $name, ParticipantId $id, Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = '';
        $this->phone = '';
        $this->fax = '';
        $this->www = '';
        $this->markedAs = 0;
        $this->additionalData = '';
    }

    /**
     * Data prefix
     * @return string
     */
    abstract protected function prefix(): string;

    /**
     * @return ParticipantId
     */
    public function id(): ParticipantId
    {
        return $this->id;
    }

    /**
     * @param ParticipantId $id
     * @return self
     */
    public function setId(ParticipantId $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return IdCard|null
     */
    public function idCard(): ?IdCard
    {
        return $this->idCard;
    }

    /**
     * @param IdCard $idCard
     * @return self
     */
    public function setIdCard(IdCard $idCard): self
    {
        $this->idCard = $idCard;
        return $this;
    }

    /**
     * @return Address
     */
    public function address(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return self
     */
    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function phone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function fax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function www(): string
    {
        return $this->www;
    }

    /**
     * @param string $www
     */
    public function setWww(string $www): void
    {
        $this->www = $www;
    }

    /**
     * @return Signature
     */
    public function signature(): ?Signature
    {
        return $this->signature;
    }

    /**
     * @param Signature $signature
     */
    public function setSignature(Signature $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return int
     */
    public function markedAs(): int
    {
        return $this->markedAs;
    }

    /**
     * @return string
     */
    public function additionalData(): string
    {
        return $this->additionalData;
    }

    /**
     * @param string $additionalData
     * @return Participant
     */
    public function setAdditionalData(string $additionalData): Participant
    {
        $this->additionalData = $additionalData;
        return $this;
    }

    /**
     * Oznaczenie danych: 0 = sprzedawca; 1 = nabywca; 2 = dostawca; 3 = odbiorca; 4 = wierzyciel; 5 = dłużnik;
     * 6 = wpłacający; 7 = wypłacający; 8 = wynajmujący; 9 = najemca; 10 = sprzedający; 11 = kupujący;
     * 12 = wystawiający; 13 = otrzymujący; 14 = zamawiający; 15 = odbierający; 16 = płatnik; 17 = oddział;
     * 18 = wystawca; 19 = wystawca noty; 20 = adres dostawy; 21 = adres do korespondencji; 22 = bez oznaczenia;
     * @param int $type
     * @return Participant
     */
    public function markAs(int $type): self
    {
        $this->markedAs = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            sprintf('%s_nazwa', $this->prefix()) => $this->name(),
            sprintf('%s_email', $this->prefix()) => $this->email(),
            sprintf('%s_telefon', $this->prefix()) => $this->phone(),
            sprintf('%s_fax', $this->prefix()) => $this->fax(),
            sprintf('%s_www', $this->prefix()) => $this->www(),
            sprintf('%s_oznaczenie', $this->prefix()) => $this->markedAs(),
            sprintf('%s_dane', $this->prefix()) => $this->address(),
            sprintf('%s_dane_oznaczenie', $this->prefix()) => $this->markedAs(),
        ];

        // Id
        $data = array_merge(
            $data,
            $this->id()->toArray($this->prefix())
        );

        // Id card
        if ($this->idCard()) {
            $data = array_merge(
                $data,
                $this->idCard()->toArray($this->prefix())
            );
        }

        // Address
        if ($this->address()) {
            $data = array_merge(
                $data,
                $this->address()->toArray($this->prefix())
            );
        }

        // Signature
        if ($this->signature()) {
            $data = array_merge(
                $data,
                $this->signature()->toArray($this->prefix())
            );
        }

        return $data;
    }
}
