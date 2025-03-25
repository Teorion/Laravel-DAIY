<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'Procedures';

    protected $fillable = [
        'contribution_id',
        'step_number',
        'title',
        'description',
        'image_url',
    ];

    public function contribution()
    {
        return $this->belongsTo(Contribution::class, 'name');
    }
}
