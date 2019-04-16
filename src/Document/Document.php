<?php

namespace Halfik\Fakturowo\Document;

use Halfik\Fakturowo\Document\Participant\Buyer;
use Halfik\Fakturowo\Document\Participant\Seller;
use Halfik\Fakturowo\Document\Payment\Payment;
use Halfik\Fakturowo\Document\Product\Product;

/**
 * Class Document
 * @package Halfik\Fakturowo\Document
 */
class Document
{
    /** @var int */
    protected $documentType;
    /** @var int */
    protected $documentDesignation;

    /** @var Email|null  */
    protected $email;

    /** @var Language|null  */
    protected $documentLanguage;
    /** @var SecondLanguage|null */
    protected $documentSecondLanguage;

    /** @var string */
    protected $documentNr;
    /** @var bool */
    protected $documentNrShow;

    /** @var Payment */
    protected $payment;

    /** @var CurrencyExchange|null */
    protected $currencyExchange;

    /** @var Note|null  */
    protected $note;

    /** @var Seller|null  */
    protected $seller;
    /** @var Buyer|null  */
    protected $buyer;

    /** @var IssueDate|null */
    protected $issueDate;

    /** @var SalesDate|null  */
    protected $salesDate;

    /** @var IssuePlace|null  */
    protected $issuePlace;

    /** @var array  */
    protected $products = [];

    /** @var Currency */
    protected $currency;

    /**
     * Document constructor.
     * @param int $documentType
     */
    protected function __construct(int $documentType)
    {
        $this->documentType = $documentType;
        $this->documentDesignation = 0;
        $this->documentLanguage = Language::polish();
        $this->setDocumentNr('');
    }

    /**
     * @return Document
     */
    public static function createVatInvoice(): self
    {
        return new self(0);
    }

    /**
     * @param bool $vat
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
     * @param bool $vat
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
     * @return Document
     */
    public function markAsOriginal(): self
    {
        $this->documentDesignation = 1;
        return $this;
    }

    /**
     * @return Document
     */
    public function markAsCopy(): self
    {
        $this->documentDesignation = 2;
        return $this;
    }

    /**
     * @return Document
     */
    public function markAsOriginalCopy(): self
    {
        $this->documentDesignation = 3;
        return $this;
    }

    /**
     * @return Document
     */
    public function markAsDuplicate(): self
    {
        $this->documentDesignation = 4;
        return $this;
    }

    /**
     * @return Document
     */
    public function markAsOriginalDuplicate(): self
    {
        $this->documentDesignation = 5;
        return $this;
    }

    /**
     * @return Document
     */
    public function markAsCopyDuplicate(): self
    {
        $this->documentDesignation = 5;
        return $this;
    }

    /**
     * @return int
     */
    public function documentDesignation(): int
    {
        return $this->documentDesignation;
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
     * @return IssuePlace|null
     */
    public function issuePlace(): ?IssuePlace
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
     * @return Language|null
     */
    public function documentLanguage(): ?Language
    {
        return $this->documentLanguage;
    }

    /**
     * @param Language $documentLanguage
     * @return Document
     */
    public function setDocumentLanguage(Language $documentLanguage): Document
    {
        $this->documentLanguage = $documentLanguage;
        return $this;
    }

    /**
     * @return SecondLanguage|null
     */
    public function documentSecondLanguage(): ?SecondLanguage
    {
        return $this->documentSecondLanguage;
    }

    /**
     * @param SecondLanguage $documentLanguage
     * @return Document
     */
    public function setDocumentSecondLanguage(SecondLanguage $documentLanguage): Document
    {
        $this->documentSecondLanguage = $documentLanguage;
        return $this;
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
     * @return Seller|null
     */
    public function seller(): ?Seller
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
     * @return Buyer|null
     */
    public function buyer(): ?Buyer
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
     * @return IssueDate|null
     */
    public function issueDate(): ?IssueDate
    {
        return $this->issueDate;
    }

    /**
     * @return SalesDate
     */
    public function salesDate(): ?SalesDate
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
     * @return Payment|null
     */
    public function payment(): ?Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     * @return Document
     */
    public function setPayment(Payment $payment): Document
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return Note|null
     */
    public function note(): ?Note
    {
        return $this->note;
    }

    /**
     * @param Note $note
     * @return Document
     */
    public function setNote(Note $note): Document
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return Email|null
     */
    public function email(): ?Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     * @return Document
     */
    public function setEmail(Email $email): Document
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return CurrencyExchange|null
     */
    public function currencyExchange(): ?CurrencyExchange
    {
        return $this->currencyExchange;
    }

    /**
     * @param CurrencyExchange|null $currencyExchange
     * @return Document
     */
    public function setCurrencyExchange(?CurrencyExchange $currencyExchange): Document
    {
        $this->currencyExchange = $currencyExchange;
        return $this;
    }

    /**
     * @param Product $product
     * @return Document
     */
    public function addProduct(Product $product): self
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @return Currency|null
     */
    public function currency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     * @return Document
     */
    public function setCurrency(Currency $currency): Document
    {
        $this->currency = $currency;
        return $this;
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
            'dokument_oznaczenie' => $this->documentDesignation(),

        ];

        // currency
        if ($this->currency) {
            $data['dokument_waluta'] = $this->currency->id();
        }

        // issue date
        if ($this->issueDate()) {
            $data = array_merge($data, $this->issueDate()->toArray());
        }

        // issue place
        if ($this->issuePlace()) {
            $data = array_merge($data, $this->issuePlace()->toArray());
        }

        // sales data
        if ($this->salesDate()) {
            $data = array_merge($data, $this->salesDate()->toArray());
        }

        // seller
        if ($this->seller()) {
            $data = array_merge($data, $this->seller()->toArray());
        }

        // buyer
        if ($this->buyer()) {
            $data = array_merge($data, $this->buyer()->toArray());
        }

        // lang
        if ($this->documentLanguage()) {
            $data = array_merge($data, $this->documentLanguage()->toArray());
        }

        // second lang
        if ($this->documentSecondLanguage()) {
            $data = array_merge($data, $this->documentSecondLanguage()->toArray());
        }

        // payment
        if ($this->payment()) {
            $data = array_merge($data, $this->payment()->toArray());
        }

        // notes
        if ($this->note()) {
            $data = array_merge($data, $this->note()->toArray());
        }

        // email
        if ($this->email()) {
            $data = array_merge($data, $this->email()->toArray());
        }

        // currency exchange
        if ($this->currencyExchange()) {
            $data = array_merge($data, $this->currencyExchange()->toArray());
        }

        /** @var Product $product */
        foreach ($this->products as $i => $product) {
            $postFix = '';
            if ($i > 0) {
                $postFix = sprintf("_%d", $i+1);
            }

            $data = array_merge($data, $product->toArray($postFix));
        }


        return $data;
    }
}
