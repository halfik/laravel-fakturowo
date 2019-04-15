<?php

namespace Halfik\Fakturowo\Document;

/**
 * Class Comment
 * @package Halfik\Fakturowo\Document
 */
class Note
{
    /** @var string */
    protected $comment;
    /** @var bool */
    protected $show;

    /** @var string */
    protected $additionalComment;
    /** @var bool */
    protected $showAdditionalComment;

    /** @var int */
    protected $designation;

    /**
     * Comment constructor.
     * @param string $comment
     * @param bool $show
     * @param int $designation
     */
    protected function __construct(string $comment, bool $show, int $designation)
    {
        $this->comment = $comment;
        $this->show = $show;
        $this->designation = $designation;
        $this->additionalComment = '';
        $this->showAdditionalComment = false;
    }

    /**
     * @param string $comment
     * @param bool $show
     * @return Note
     */
    public static function withOutMark(string $comment, bool $show): self
    {
        return new static($comment, $show, 0);
    }

    /**
     * @param string $comment
     * @param bool $show
     * @return Note
     */
    public static function note(string $comment, bool $show): self
    {
        return new static($comment, $show, 1);
    }

    /**
     * @param string $comment
     * @param bool $show
     * @return Note
     */
    public static function important(string $comment, bool $show): self
    {
        return new static($comment, $show, 2);
    }

    /**
     * @param string $comment
     * @param bool $show
     * @return Note
     */
    public static function comment(string $comment, bool $show): self
    {
        return new static($comment, $show, 3);
    }

    /**
     * @param string $comment
     * @param bool $show
     * @return Note
     */
    public static function annotation(string $comment, bool $show): self
    {
        return new static($comment, $show, 4);
    }

    /**
     * @param string $comment
     * @param bool $show
     * @return Note
     */
    public static function postscript(string $comment, bool $show): self
    {
        return new static($comment, $show, 5);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dokument_pokaz_uwagi' => (int) $this->show,
            'dokument_uwagi' => $this->comment,
            'dokument_uwagi_oznaczenie' => $this->designation,
            'dokument_uwagi_dodatkowe' => $this->additionalComment,
            'dokument_uwagi_niewidoczne' => (int) $this->showAdditionalComment
        ];
    }
}
