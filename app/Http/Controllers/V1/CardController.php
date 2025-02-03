<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCardRequest;
use App\Http\Requests\V1\StoreCardRequest;
use App\Models\Card;
use App\Services\Contracts\CardServiceContract;

class CardController extends Controller
{
    public function __construct(private readonly CardServiceContract $cardService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return response()->json($this->cardService->getAllCards());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $this->cardService->deleteCard($card->id);
        return response()->json(['message' => __('ui.Card deleted successfully')]);
    }
}
