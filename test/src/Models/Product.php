<?php

namespace App\Models;

class Product
{
    protected float $price;
    protected int $units;
    protected ProductType $type;

    /**
     * @param float $price
     * @param int $units
     * @param ProductType $productType
     */
    public function __construct(float $price, int $units, ProductType $productType)
    {
        $this->price = $price;
        $this->units = $units;
        $this->type = $productType;
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
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnits(): int
    {
        return $this->units;
    }

    /**
     * @param int $units
     * @return Product
     */
    public function setUnits(int $units): Product
    {
        $this->units = $units;
        return $this;
    }

    /**
     * @return ProductType
     */
    public function getType(): ProductType
    {
        return $this->type;
    }

    /**
     * @param ProductType $type
     * @return Product
     */
    public function setType(ProductType $type): Product
    {
        $this->type = $type;
        return $this;
    }

    public function getCostPerUnit()
    {
        return $this->getPrice()/$this->getUnits();
    }
}
