<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use HasFactory, SoftDeletes;
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'value',
        'status'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
