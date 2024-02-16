<?php 

namespace App\Repositories;

use App\Models\Tax;
use Ramsey\Uuid\Uuid;

class TaxRepository
{
    public function getAllTaxes()
    {
        return Tax::all();
    }

    public function getTaxByStatus($status)
    {
        return Tax::where('status', $status);
    }

    public function createTax($data)
    {
        return Tax::create([
            'id' => Uuid::uuid4()->toString(),
            'value' => $data['value']
        ]);
    }

    public function updateTax($data, $id)
    {
        return Tax::find($id)->update([
            'value' => $data['value']
        ]);
    }
}