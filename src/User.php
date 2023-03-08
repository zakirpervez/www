<?php
class User
{
    /** @var string */
    public string $first_name = '';
    /** @var string */
    public string $last_name = '';
    /** @var string */
    public string $email;
    /** @var Mailer */
    public Mailer $mailer;

    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

    public function getFullName(): string
    {
        return trim($this->first_name. " ". $this->last_name);
    }

    public function notify($message): bool
    {
        return $this->mailer->sendEmail($this->email, $message);
    }
}