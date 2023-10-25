<?php

namespace App\Http\Requests\Barang;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'jenis_barang' => 'required|exists:jenis_barang,id', // Validate that the selected jenis_barang exists in the jenis_barangs table.
            'kondisi_barang' => 'required|exists:kondisi_barang,id', // Validate that the selected kondisi_barang exists in the kondisi_barangs table.
            'deskripsi' => 'nullable|string|max:128',
            'kecacatan' => 'nullable|string|max:128',
            'jumlah_barang' => 'required|integer',
            'gambar_barang' => 'required|image|max:2048|mimes:jpg,jpeg,png', // Adjust the max file size to your needs.
        ];
    }
}
