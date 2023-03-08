<?php
class User
{
    /** @var string */
    public $first_name;
    /** @var string */
    public $last_name;
    /** @var string */
    public $email;
    /** @var Mailer */
    public $mailer;

    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getFullName(): string
    {
        return trim($this->first_name. " ". $this->last_name);
    }

    public function notify($message) {
        return $this->mailer->sendEmail($this->email, $message);
    }
}