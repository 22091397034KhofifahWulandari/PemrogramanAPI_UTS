<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Ini menunjukkan bahwa request diizinkan tanpa pengecekan otorisasi tambahan. Sesuaikan sesuai dengan kebutuhan aplikasi Anda.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'string', 'max:255'], // Aturan validasi untuk first_name: opsional, harus berupa string, maksimal 255 karakter
            'last_name' => ['nullable', 'string', 'max:255'], // Aturan validasi untuk last_name: opsional, harus berupa string, maksimal 255 karakter
            'email' => ['nullable', 'string', 'email', 'max:255'], // Aturan validasi untuk email: opsional, harus berupa string, harus format email yang valid, maksimal 255 karakter
            'phone' => ['nullable', 'string', 'max:20'], // Aturan validasi untuk phone: opsional, harus berupa string, maksimal 20 karakter
        ];
    }
}
