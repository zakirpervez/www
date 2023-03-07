<?php
class User
{
    public $first_name;
    public $last_name;

    public function getFullName(): string
    {
        return trim($this->first_name. " ". $this->last_name);
    }
}