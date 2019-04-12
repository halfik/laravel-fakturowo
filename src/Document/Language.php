<?php


namespace Halfik\Fakturowo\Document;

/**
 * Class Language
 * @package Halfik\Fakturowo\Document
 */
class Language
{
    /** @var int */
    protected $id;

    /**
     * Language constructor.
     * @param int $id
     */
    protected function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return Language
     */
    public static function polish(): self
    {
        return new static(0);
    }

    /**
     * @return Language
     */
    public static function english(): self
    {
        return new static(1);
    }

    /**
     * @return Language
     */
    public static function czech(): self
    {
        return new static(2);
    }

    /**
     * @return Language
     */
    public static function danish(): self
    {
        return new static(3);
    }

    /**
     * @return Language
     */
    public static function french(): self
    {
        return new static(4);
    }

    /**
     * @return Language
     */
    public static function dutch(): self
    {
        return new static(5);
    }

    /**
     * @return Language
     */
    public static function german(): self
    {
        return new static(6);
    }

    /**
     * @return Language
     */
    public static function norwegian(): self
    {
        return new static(7);
    }

    /**
     * @return Language
     */
    public static function russian(): self
    {
        return new static(8);
    }

    /**
     * @return Language
     */
    public static function swedish(): self
    {
        return new static(9);
    }

    /**
     * @return Language
     */
    public static function ukrainian(): self
    {
        return new static(10);
    }

    /**
     * @return Language
     */
    public static function hungarian(): self
    {
        return new static(11);
    }

    /**
     * @return Language
     */
    public static function italian(): self
    {
        return new static(12);
    }

    /**
     * @return Language
     */
    public static function belarusian(): self
    {
        return new static(13);
    }

    /**
     * @return Language
     */
    public static function bulgarian(): self
    {
        return new static(14);
    }

    /**
     * @return Language
     */
    public static function spanish(): self
    {
        return new static(15);
    }

    /**
     * @return Language
     */
    public static function portuguese(): self
    {
        return new static(16);
    }

    /**
     * @return Language
     */
    public static function turkish(): self
    {
        return new static(17);
    }

    /**
     * @return Language
     */
    public static function lithuanian(): self
    {
        return new static(18);
    }

    /**
     * @return Language
     */
    public static function latvian(): self
    {
        return new static(19);
    }

    /**
     * @return Language
     */
    public static function romanian(): self
    {
        return new static(20);
    }

    /**
     * @return Language
     */
    public static function finnish(): self
    {
        return new static(21);
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_jezyk' => $this->id(),
        ];
    }
}
