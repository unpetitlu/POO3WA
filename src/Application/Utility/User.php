<?php

namespace Application\Utility;

class User
{
    private $firstname;
    private $lastname;

    public function __construct($firstname = "ludo", $lastname = '3wa')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        //echo 'je suis dans le psr-0';
    }
}