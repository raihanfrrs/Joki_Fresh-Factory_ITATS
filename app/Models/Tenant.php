<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tenant extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $keyType = "string";
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'identity_number',
        'email',
        'phone',
        'pob',
        'dob',
        'gender',
        'address',
        'status'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('tenant_images')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
