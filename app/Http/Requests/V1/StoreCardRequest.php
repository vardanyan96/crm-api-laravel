<?php

namespace App\Http\Requests\V1;

use App\Enums\CardStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => Rule::in(array_keys((array)CardStatusEnum::NEW->label())),
            'country' => 'nullable|string',
            'author_id' => 'required|integer',
            'reminder_at' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }
}
