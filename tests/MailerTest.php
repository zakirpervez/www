<?php


use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendEmail() {
        $mailerMocked = $this->createMock(Mailer::class);
        $mailerMocked->method('sendEmail')->willReturn(true);
        $result = $mailerMocked->sendEmail('zakir.mohammad@example.com', 'Content for the email');
        $this->assertTrue($result);
    }
}
