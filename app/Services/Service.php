<?php

namespace App\Services;

use App\Repositories\Contracts\CardRepositoryContract;

class Service
{
    public function __construct(
        protected readonly CardRepositoryContract $cardRepository
    )
    {
    }

    public function getAllCards()
    {
        return $this->cardRepository->getAll();
    }

    public function getCardById($id)
    {
        return $this->cardRepository->findById($id);
    }

    public function createCard(array $data)
    {
        return $this->cardRepository->create($data);
    }

    public function updateCard($id, array $data)
    {
        return $this->cardRepository->update($id, $data);
    }

    public function deleteCard($id)
    {
        return $this->cardRepository->delete($id);
    }
}
