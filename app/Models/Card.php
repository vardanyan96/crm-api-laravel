<?php

namespace App\Models;

use App\Enums\CardStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'country',
        'author_id',
        'reminder_at',
    ];

    protected $casts = [
        'status' => CardStatusEnum::class,
        'reminder_at' => 'datetime',
    ];
}
