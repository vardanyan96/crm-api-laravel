<?php

namespace App\Services\Contracts;

interface CardServiceContract
{

    public function getAllCards();

    public function deleteCard(int $card);
}
