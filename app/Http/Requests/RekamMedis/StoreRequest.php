<?php

namespace App\Http\Requests\RekamMedis;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'pasien_id' => 'required|exists:pasien,id', // Validate that the selected pasien exists in the pasiens table.
            'dokter_id' => 'required|exists:dokter,id', // Validate that the selected dokter exists in the dokter table.
            'kondisi_kesehatan' => 'nullable|string|max:255', // Adjust the max length to your needs.
            'suhu_tubuh' => 'required|numeric|between:35,45.5', // Accepts values between 35 and 45.5.
            'gambar_resep' => 'required|file|max:2048|mimes:pdf,png,jpg,jpeg', // Adjust the max file size and allowed MIME types to your needs.
        ];
    }
}