<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactGetRequest extends FormRequest
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
            'id' => ['required', 'numeric'], // Aturan validasi untuk id: wajib diisi, harus berupa angka
        ];
    }
}
