<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Izinkan permintaan tanpa pengecekan otorisasi tambahan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // Aturan validasi untuk pencarian alamat
            'street' => ['nullable', 'string', 'max:255'], // Opsional, harus string, maksimal 255 karakter
            'city' => ['nullable', 'string', 'max:255'], // Opsional, harus string, maksimal 255 karakter
            'province' => ['nullable', 'string', 'max:255'], // Opsional, harus string, maksimal 255 karakter
            'country' => ['nullable', 'string', 'max:255'], // Opsional, harus string, maksimal 255 karakter
            'postal_code' => ['nullable', 'string', 'max:20'], // Opsional, harus string, maksimal 20 karakter
            'size' => ['nullable', 'integer', 'min:1'], // Opsional, harus integer, minimal 1
            'page' => ['nullable', 'integer', 'min:1'], // Opsional, harus integer, minimal 1
        ];
    }
}
