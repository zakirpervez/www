<?php

class Order
{
    /** @var int $amount */
    public $amount = 0;

    /** @var PaymentGateway */
    protected $gatway;

    /**
     * Instantiate Order
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gatway = $gateway;
    }

    /**
     * Process order request with given amount.
     * @return bool success or fail.
     */
    public function process(): bool {
        return $this->gatway->charge($this->amount);
    }

}