<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'nullable', /* required|string|alpha_dash|max:60 */
            'email' => 'nullable', /* required|email:rfc,dns|max:60 */
            'phone' => 'nullable', /* nullable|string|regex:/(^(\+?)([0-9-\ \(\)]+)$)/u|max:24 */
        ];
    }
}
