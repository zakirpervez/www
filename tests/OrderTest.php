<?php


use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testOrderIsProceed() {
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->onlyMethods(['charge'])
            ->getMock();

        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}
