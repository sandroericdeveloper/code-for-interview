<?php

namespace App\Models;

class OrderItem
{
    protected ProductType $productType;
    protected int $quantity;

    /**
     * @param ProductType $productType
     * @param int $quantity
     */
    public function __construct(ProductType $productType, int $quantity)
    {
        $this->productType = $productType;
        $this->quantity = $quantity;
    }

    /**
     * @return ProductType
     */
    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    /**
     * @param ProductType $productType
     * @return OrderItem
     */
    public function setProductType(ProductType $productType): OrderItem
    {
        $this->productType = $productType;
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
     * @return OrderItem
     */
    public function setQuantity(int $quantity): OrderItem
    {
        $this->quantity = $quantity;
        return $this;
    }
}
