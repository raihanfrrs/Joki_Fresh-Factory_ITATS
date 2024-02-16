<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'value'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
