<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'capacity' => 'required',
            'facility' => 'required',
            'surface_area' => 'required',
            'building_area' => 'required',
            'city' => 'required',
            'address' => 'required',
            'warehouse_category_id' => 'required',
            'warehouse_image' => 'file|image',
            'description' => 'required'
        ];
    }
}
