# Fakturowo.pl API
Paczka do komunikacji z API fakturowo.pl

    1. Publikacja konfiga:
    php artisan vendor:publish --provider="Halfik\Fakturowo\Providers\FakturowoProvider"
    
    2. W .env konfigurujemy:
    FAKTUROWO_KEY=Twoj_API_KEY
    
    3. W app.php dodajemy provider:
     \Halfik\Fakturowo\Providers\FakturowoProvider::class,
 
Przykład użycia:
            
            use Halfik\Fakturowo;
            
            /** @var Fakturowo\Fakturowo $fakturowo */
            $fakturowo = \App::make('fakturowo.pl');
    
            /** @var Fakturowo\Document\Document $document */
            $document = Fakturowo\Document\Document::createPZ();
    
            $buyerAddress = new \Halfik\Fakturowo\Document\Participant\Address(
                'Polska',
                'Warszawa',
                '03-492',
                'ul. kupiecka 12'
            );
            $buyer = new Fakturowo\Document\Participant\Buyer(
                'Kupujacy AddDocumentTest',
                Fakturowo\Document\Participant\ParticipantId::nip('7979391584'),
                $buyerAddress
            );
    
            $sellerAddress = new \Halfik\Fakturowo\Document\Participant\Address(
                'Polska',
                'Kraków',
                '30-063',
                'ul. sprzedawcy 6a'
            );
            $seller = new Fakturowo\Document\Participant\Seller(
                'Sprzedajacy AddDocumentTest',
                Fakturowo\Document\Participant\ParticipantId::pesel('91021971851'),
                $sellerAddress
            );
    
            $issuePlace = new Fakturowo\Document\IssuePlace('Wrocław', true);
            $issueDate = new Fakturowo\Document\IssueDate("2018-01-05", null, true);
            $salesDate = Fakturowo\Document\SalesDate::sales("2018-01-01", null);
    
            $note = Fakturowo\Document\Note::comment('comment', true);
            $email = new Fakturowo\Document\Email('no@email.com', 'email title', 'email content');
            $currencyExchange = Fakturowo\Document\CurrencyExchange::sourceNBP(new \DateTimeImmutable(), 'EUR');
    
            $productOne = new Fakturowo\Document\Product\Product(
                'Product one',
                Fakturowo\Document\Product\Quantity::piece(2),
                Fakturowo\Document\Product\Price::gross(9.99, 19)
            );
            $productTwo = new Fakturowo\Document\Product\Product(
                'Proeuct two',
                Fakturowo\Document\Product\Quantity::service(1),
                Fakturowo\Document\Product\Price::net(15.50, 'np')
            );
    
            $payment = new Fakturowo\Document\Payment\Payment(
                (15.50+9.99),
                Fakturowo\Document\Payment\PaymentMethod::paidDotPay(true),
                Fakturowo\Document\Payment\PaymentStatus::paid(),
                Fakturowo\Document\Payment\PaymentDate::paymentDate(new \DateTimeImmutable(), true),
                new Fakturowo\Document\Payment\PaymentDeadline(7, true)
            );
    
            $payment->addBankAccount(
                new Fakturowo\Document\Payment\BankAccount('16249000056261910404297588')
            );
    
            $document->setBuyer($buyer)
                    ->setSeller($seller)
                    ->setDocumentLanguage(Fakturowo\Document\Language::polish())
                    ->setIssuePlace($issuePlace)
                    ->setIssueDate($issueDate)
                    ->setSalesDate($salesDate)
                    ->setNote($note)
                    ->setEmail($email)
                    ->setCurrencyExchange($currencyExchange)
                    ->addProduct($productOne)
                    ->addProduct($productTwo)
                    ->markAsOriginal()
                    ->setPayment($payment)
            ;
    
            $result = $fakturowo->new($document);