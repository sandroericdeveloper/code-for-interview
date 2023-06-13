<?php

namespace App\Models;

class ProductType
{
    protected string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @return ProductType
     */
    public function setName(string $name): ProductType
    {
        $this->name = $name;
        return $this;
    }
}
