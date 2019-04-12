<?php

namespace Halfik\Fakturowo\Document;

use Halfik\Fakturowo\Document\Participant\Buyer;
use Halfik\Fakturowo\Document\Participant\Seller;

/**
 * Class Document
 * @package Halfik\Fakturowo\Document
 */
class Document
{
    /** @var int */
    protected $documentType;
    /** @var string */
    protected $documentNr;
    /** @var bool */
    protected $documentNrShow;
    /** @var Seller */
    protected $seller;
    /** @var Buyer */
    protected $buyer;

    /** @var IssueDate */
    protected $issueDate;

    /** @var SalesDate */
    protected $salesDate;

    /** @var IssuePlace */
    protected $issuePlace;

    /**
     * Document constructor.
     * @param int $documentType
     */
    protected function __construct(int $documentType)
    {
        $this->documentType = $documentType;
    }

    /**
     * @return Document
     */
    public static function createVatInvoice(): self
    {
        return new self(0);
    }

    /**
     * @return Document
     */
    public static function createProformaInvoice(bool $vat = true): self
    {
        if ($vat) {
            return new self(2);
        }
        return new self(53);
    }

    /**
     * @return Document
     */
    public static function createAdvanceInvoice(): self
    {
        return new self(3);
    }

    /**
     * @return Document
     */
    public static function createInternalInvoice(): self
    {
        return new self(4);
    }

    /**
     * @return Document
     */
    public static function createVatMarginInvoice(): self
    {
        return new self(5);
    }

    /**
     * @return Document
     */
    public static function createBill(): self
    {
        return new self(6);
    }

    /**
     * @return Document
     */
    public static function createSimplifiedInvoice(): self
    {
        return new self(12);
    }

    /**
     * @return Document
     */
    public static function createCashRegisterInvoice(): self
    {
        return new self(13);
    }

    /**
     * @return Document
     */
    public static function createCollectiveInvoice(): self
    {
        return new self(14);
    }

    /**
     * @return Document
     */
    public static function createReceipt(): self
    {
        return new self(20);
    }

    /**
     * @return Document
     */
    public static function createNoVatInvoice(): self
    {
        return new self(21);
    }

    /**
     * @return Document
     */
    public static function createVatRrInvoice(): self
    {
        return new self(26);
    }

    /**
     * @return Document
     */
    public static function createExternalIssueNoVat(): self
    {
        return new self(29);
    }

    /**
     * @return Document
     */
    public static function createFinalInvoice(): self
    {
        return new self(31);
    }

    /**
     * @return Document
     */
    public static function createExternalIssue(): self
    {
        return new self(33);
    }

    /**
     * @return Document
     */
    public static function createReverseChargeInvoice(): self
    {
        return new self(35);
    }

    /**
     * @return Document
     */
    public static function createPW(): self
    {
        return new self(36);
    }

    /**
     * @return Document
     */
    public static function createPZ(): self
    {
        return new self(37);
    }

    /**
     * @return Document
     */
    public static function createWZ(): self
    {
        return new self(38);
    }

    /**
     * @return Document
     */
    public static function createInternalVatInvoice(): self
    {
        return new self(40);
    }

    /**
     * @return Document
     */
    public static function createWDT(): self
    {
        return new self(41);
    }

    /**
     * @return Document
     */
    public static function createGoodsExport(): self
    {
        return new self(42);
    }

    /**
     * @return Document
     */
    public static function createWntInvoice(): self
    {
        return new self(43);
    }

    /**
     * @return Document
     */
    public static function createVatMpInvoice(): self
    {
        return new self(44);
    }

    /**
     * @return Document
     */
    public static function createReverseChangeWithoutVatInvoice(): self
    {
        return new self(45);
    }

    /**
     * @return Document
     */
    public static function createServicesExport(): self
    {
        return new self(48);
    }

    /**
     * @return Document
     */
    public static function createServicesExportVatEu(): self
    {
        return new self(49);
    }


    /**
     * @return Document
     */
    public static function createCommodityImport(): self
    {
        return new self(50);
    }

    /**
     * @return Document
     */
    public static function createServicesImport(): self
    {
        return new self(51);
    }

    /**
     * @return Document
     */
    public static function createServicesImportVatEu(): self
    {
        return new self(52);
    }

    /**
     * @return Document
     */
    public static function createAdvanceVatMarginInvoice(): self
    {
        return new self(58);
    }

    /**
     * @return Document
     */
    public static function createFinalMarginInvoice(bool $vat = false): self
    {
        if ($vat) {
            return new self(59);
        }
        return new self(60);
    }

    /**
     * @return Document
     */
    public static function createInvoice(): self
    {
        return new self(62);
    }


    /**
     * @param IssuePlace $issuePlace
     * @return Document
     */
    public function setIssuePlace(IssuePlace $issuePlace): Document
    {
        $this->issuePlace = $issuePlace;
        return $this;
    }

    /**
     * @return IssuePlace
     */
    public function issuePlace(): IssuePlace
    {
        return $this->issuePlace;
    }

    /**
     * @return mixed
     */
    public function documentNr()
    {
        return $this->documentNr;
    }

    /**
     * @param string $documentNr
     * @param bool $show
     * @return Document
     */
    public function setDocumentNr(string $documentNr, bool $show = true): self
    {
        $this->documentNr = $documentNr;
        $this->documentNrShow = $show;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentNrShow(): bool
    {
        return $this->documentNrShow;
    }

    /**
     * @param bool $documentNrShow
     */
    public function setDocumentNrShow(bool $documentNrShow): void
    {
        $this->documentNrShow = $documentNrShow;
    }

    /**
     * @return Seller
     */
    public function seller(): Seller
    {
        return $this->seller;
    }

    /**
     * @param Seller $seller
     * @return Document
     */
    public function setSeller(Seller $seller): self
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return Buyer
     */
    public function buyer(): Buyer
    {
        return $this->buyer;
    }

    /**
     * @param Buyer $buyer
     * @return Document
     */
    public function setBuyer(Buyer $buyer): self
    {
        $this->buyer = $buyer;
        return $this;
    }

    /**
     * @param IssueDate $issueDate
     * @return Document
     */
    public function setIssueDate(IssueDate $issueDate): Document
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @param SalesDate $salesDate
     * @return Document
     */
    public function setSalesDate(SalesDate $salesDate): Document
    {
        $this->salesDate = $salesDate;
        return $this;
    }

    /**
     * @return IssueDate
     */
    public function issueDate(): IssueDate
    {
        return $this->issueDate;
    }

    /**
     * @return SalesDate
     */
    public function salesDate(): SalesDate
    {
        return $this->salesDate;
    }

    /**
     * @return int
     */
    public function documentType(): int
    {
        return $this->documentType;
    }

    /**
     * @return array
     */
    public final function toArray(): array
    {
        $data = [
            'dokument_numer' => $this->documentNr(),
            'dokument_pokaz_numer' => (int) $this->documentNrShow,
            'dokument_rodzaj' => $this->documentType(),
        ];

        // issue date
        $data = array_merge($data, $this->issueDate()->toArray());

        // issue place
        $data = array_merge($data, $this->issuePlace()->toArray());

        // sales data
        $data = array_merge($data, $this->salesDate()->toArray());

        // seller
        $data = array_merge($data, $this->seller()->toArray());

        // buyer
        $data = array_merge($data, $this->buyer()->toArray());

        return $data;
    }
}
