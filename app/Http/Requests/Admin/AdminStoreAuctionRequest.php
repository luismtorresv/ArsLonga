<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class AdminStoreAuctionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->getRole() === 'admin';
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'start_date' => Carbon::parse($this->start_date),
            'final_date' => Carbon::parse($this->final_date),
        ]);
    }

    public function rules(): array
    {
        return [
            'start_date' => 'required|date',
            'final_date' => 'required|date|after:start_date',
            'artwork_id' => 'required|exists:artworks,id',
            'winning_bidder_id' => 'nullable|exists:users,id',
        ];
    }
}
