<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactSearchRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'], // Aturan validasi untuk name: opsional, harus string, maksimal 255 karakter
            'phone' => ['nullable', 'string', 'max:20'], // Aturan validasi untuk phone: opsional, harus string, maksimal 20 karakter
            'email' => ['nullable', 'string', 'email', 'max:255'], // Aturan validasi untuk email: opsional, harus string, harus format email yang valid, maksimal 255 karakter
            'size' => ['nullable', 'integer', 'min:1'], // Aturan validasi untuk size: opsional, harus integer, minimal 1
            'page' => ['nullable', 'integer', 'min:1'], // Aturan validasi untuk page: opsional, harus integer, minimal 1
        ];
    }
}
