<?php

namespace DI0;


class Customer
{
    // ..........

    /**
     * @var ?int
     */
    private ?int $currentOrder = null;

    /**
     * @return bool
     */
    public function buyItems(): bool
    {
        if (is_null($this->currentOrder)) {
            return false;
        }

        $processor = new OrderProcessor();
        return $processor->checkout($this->currentOrder);
    }

    // ..........
}


class OrderProcessor
{
    /**
     * @param int $order
     * @return bool
     */
    public function checkout(int $order) : bool
    {
        // ..........
        // ..........
        // ..........
        // ..........
    }
}










$customer = new Customer();
$customer->buyItems();