<?php

namespace App\Models;

use App\Models\Procedure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contribution extends Model
{
    protected $table = 'contributions';

    protected $fillable = [
        'name',
        'description',
        'user_id', //creator
        'thumbnail_url',
    ];

    public function procedures(): HasMany
    {
        return $this->hasMany(Procedure::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contribution) {
            if (Auth::check()) {
                $contribution->user_id = Auth::id();
            }
        });
    }
}
