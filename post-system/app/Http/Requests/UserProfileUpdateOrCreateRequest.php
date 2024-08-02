<?php

namespace App\Http\Requests;

use App\Models\UserProfile;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateOrCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile_photo' => 'nullable|image',
            'cover_photo' => 'nullable|image',
            'privacy' => ['required',Rule::in(UserProfile::privacy)],
            // 'privacy' => 'required|in:' . implode(',', UserProfile::privacy),
            'skills' => 'array|nullable',
        ];
    }
}