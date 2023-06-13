<?php

namespace App\Models;

class Supplier
{
    protected string $name;
    protected array $products;

    /**
     * @param string $name
     * @param array $products
     */
    public function __construct(string $name, array $products)
    {
        $this->name = $name;
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Supplier
     */
    public function setName(string $name): Supplier
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return Supplier
     */
    public function setProducts(array $products): Supplier
    {
        $this->products = $products;
        return $this;
    }

    public function getQuote(Order $order)
    {
        $quote = new Quote($this, $order);
        foreach ($order->getOrderItems() as $orderItem) {
            $quoteItems = $this->getQuoteItems($orderItem);
            if ($quoteItems) {
                $quote->addItems($quoteItems);
            }
        }
        return $quote;
    }

    public function getQuoteItems(OrderItem $orderItem)
    {
        $remainingQuantity = $requestedQuantity = $orderItem->getQuantity();
        $quoteItems = [];
        $filledQuantity = 0;

        $availableProducts = $this->getProductsByType($orderItem->getProductType());
        if (!$availableProducts) {
            return null;
        }

        usort($availableProducts, function ($productA, $productB) {
            return $productA->getCostPerUnit() > $productB->getCostPerUnit();
        });

        foreach ($availableProducts as $availableProduct) {
            $rest = $remainingQuantity % $availableProduct->getUnits();
            if ($rest < $remainingQuantity) {
                $itemQuantity = intdiv($remainingQuantity, $availableProduct->getUnits());
                $itemPrice = $itemQuantity * $availableProduct->getPrice();
                $quoteItems[] = (new QuoteItem($availableProduct, $itemQuantity, $itemPrice));

                $filledQuantity += $itemQuantity * $availableProduct->getUnits();
                $remainingQuantity = $requestedQuantity - $filledQuantity;
            }
            if ($filledQuantity == $requestedQuantity) {
                break;
            }
        }
        return $filledQuantity == $requestedQuantity ? $quoteItems : null;
    }

    private function getProductsByType(ProductType $productType)
    {
        $products = $this->getProducts();
        $availableProducts = [];
        foreach ($products as $product) {
            if ($product->getType()->getName() == $productType->getName()) {
                $availableProducts[] = $product;
            }
        }
        return $availableProducts;
    }
}
