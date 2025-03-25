<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'name',
        'description',
        'user_id' //tag creator
    ];

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }
}
