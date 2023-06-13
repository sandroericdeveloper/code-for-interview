<?php

namespace App\Models;

class Quote
{
    protected Supplier $supplier;
    protected Order $order;
    protected array $quoteItems = [];

    /**
     * @param Supplier $supplier
     * @param Order $order
     */
    public function __construct(Supplier $supplier, Order $order)
    {
        $this->supplier = $supplier;
        $this->order = $order;
    }

    /**
     * @return Supplier
     */
    public function getSupplier(): Supplier
    {
        return $this->supplier;
    }

    /**
     * @param Supplier $supplier
     * @return Quote
     */
    public function setSupplier(Supplier $supplier): Quote
    {
        $this->supplier = $supplier;
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return Quote
     */
    public function setOrder(Order $order): Quote
    {
        $this->order = $order;
        return $this;
    }

    public function getTotalPrice(): float
    {
        $total = 0;
        foreach ($this->getItems() as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function addItems(array $quoteItems)
    {
        $this->quoteItems = array_merge($this->quoteItems, $quoteItems);
    }

    /**
     * @return QuoteItem[]
     */
    public function getItems(): array
    {
        return $this->quoteItems;
    }
}
