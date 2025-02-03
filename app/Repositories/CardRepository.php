<?php

namespace App\Repositories;

use App\Models\Card;

class CardRepository extends Repository implements Contracts\CardRepositoryContract
{
    public function model(){
        return Card::query();
    }

    public function getAll()
    {
        return $this->model()->newQuery()->get();
    }

    public function findById($id)
    {
        return $this->model()->newQuery()->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model()->newQuery()->create($data);
    }

    public function update($id, array $data)
    {
        $card = $this->findById($id);
        $card->update($data);
        return $card;
    }

    public function delete($id)
    {
        $card = $this->findById($id);
        return $card->delete();
    }
}
