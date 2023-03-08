<?php

/**
 * Mailer
 * Send emails
 */
class Mailer
{

    /**
     * @param string $email
     * @param string $message
     *
     * @return true
     */
    public function sendEmail(string $email, string $message): bool
    {
        sleep(3);
        echo "send $message to $email";
        return true;
    }

}