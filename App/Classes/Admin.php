<?php

namespace App\Classes;

use App\Classes\Utilisateur;

class Admin extends Utilisateur
{
    public function __construct(string $nom, string $email, string $password)
    {
        return parent::__construct($nom, $email, $password);
    }
}
