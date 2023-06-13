<?php

namespace App\Models;

class QuoteItem
{
    protected Product $product;
    protected int $quantity;
    protected float $price;

    /**
     * @param Product $product
     * @param int $quantity
     * @param float $price
     */
    public function __construct(Product $product, int $quantity, float $price)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return QuoteItem
     */
    public function setProduct(Product $product): QuoteItem
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return QuoteItem
     */
    public function setQuantity(int $quantity): QuoteItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return QuoteItem
     */
    public function setPrice(float $price): QuoteItem
    {
        $this->price = $price;
        return $this;
    }
}
