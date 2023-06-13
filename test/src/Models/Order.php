<?php

namespace App\Models;

class Order
{
    protected Customer $customer;
    protected array $orderItems;

    /**
     * @param Customer $customer
     * @param OrderItem[] $orderItems
     */
    public function __construct(Customer $customer, array $orderItems)
    {
        $this->customer = $customer;
        $this->orderItems = $orderItems;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Order
     */
    public function setCustomer(Customer $customer): Order
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param array $orderItems
     * @return Order
     */
    public function setOrderItems(array $orderItems): Order
    {
        $this->orderItems = $orderItems;
        return $this;
    }
}
