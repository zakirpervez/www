<?php

class Order
{
    /** @var int $quantity */
    public int $quantity = 0;

    /** @var float $unitPrice */
    public float $unitPrice = 0.0;

    /** @var int|float $amount */
    public int|float $amount = 0;

    /**
     * Instantiate Order
     *
     * @param int $quantity
     * @param float $unitPrice
     */
    public function __construct(int $quantity, float $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;

        $this->amount = $quantity * $unitPrice;
    }


    /**
     * Process order request with given amount.
     *
     * @param PaymentGateway $gateway
     *
     * @return void
     */
    public function process(PaymentGateway $gateway) {
        return $gateway->charge($this->amount);
    }

    /**
     * Process order request with given amount.
     *
     * @param PaymentGateway $gateway
     *
     * @return bool
     */
    public function processPayment(PaymentGateway $gateway): bool {
        return $gateway->charge($this->amount);
    }

}