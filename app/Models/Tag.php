<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'description',
        'user_id' //tag creator
    ];

    public function contributions(): BelongsToMany
    {
        return $this->belongsToMany(Contribution::class);
    }
}
