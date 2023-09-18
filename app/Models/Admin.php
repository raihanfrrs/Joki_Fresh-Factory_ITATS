<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class Admin extends Model
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [
        'id'
    ];

    public function getAllAdminExceptMe($id): Collection
    {
        return $this->whereNot('user_id', $id)
                    ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
