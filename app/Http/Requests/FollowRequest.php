<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class FollowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('follow-user', $this->followed_id);
    }

    public function rules(): array
    {
        return [
            'followed_id' => ['required', 'exists:users,id'],
        ];
    }

    public function passedValidation(): void 
    {
        $this->merge(['followable' => User::find($this->followed_id)]);  
    }
}