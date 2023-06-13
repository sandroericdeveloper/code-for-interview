<?php

namespace App;

use App\Models\Order;
use App\Models\Quote;

class QuoteGenerator
{
    protected DataRepository $dataRepository;
    protected Order $order;
    protected array $quotes = [];
    protected ?Quote $cheapestQuote = null;

    /**
     * @param DataRepository $dataRepository
     * @param Order $order
     */
    public function __construct(DataRepository $dataRepository, Order $order)
    {
        $this->dataRepository = $dataRepository;
        $this->order = $order;
    }

    public function generateQuotes()
    {
        $suppliers = $this->dataRepository->findSuppliers();
        foreach ($suppliers as $supplier) {
            $quote = $supplier->getQuote($this->order);
            if ($quote) {
                $this->quotes[] = $quote;
                $this->cheapestQuote = !$this->getCheapestQuote() ||
                    $quote->getTotalPrice() < $this->cheapestQuote->getTotalPrice() ?
                    $quote :
                    $this->getCheapestQuote();
            }
        }
    }

    public function getQuotes(): array
    {
        return $this->quotes;
    }

    public function getCheapestQuote()
    {
        return $this->cheapestQuote;
    }
}