<?php

namespace App;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Supplier;

class DataRepository
{
    private array $productTypes;
    private array $suppliers;

    public function __construct()
    {
        $this->productTypes = [
            new ProductType('Dental Floss'),
            new ProductType('Ibuprofen'),
        ];
        $this->suppliers = [
            new Supplier(
                'Supplier A',
                [
                    new Product(9, 1, $this->productTypes[0]),
                    new Product(160, 20, $this->productTypes[0]),
                    new Product(5, 1, $this->productTypes[1]),
                    new Product(48, 10, $this->productTypes[1]),
                ]
            ),
            new Supplier(
                'Supplier B',
                [
                    new Product(8, 1, $this->productTypes[0]),
                    new Product(71, 10, $this->productTypes[0]),
                    new Product(6, 1, $this->productTypes[1]),
                    new Product(25, 5, $this->productTypes[1]),
                    new Product(410, 100, $this->productTypes[1]),
                ]
            )
        ];
    }

    public function findSuppliers()
    {
        return $this->suppliers;
    }

    public function findProductTypes()
    {
        return $this->productTypes;
    }
}