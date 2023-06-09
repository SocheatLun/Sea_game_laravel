<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventDetail extends Model
{
    use HasFactory;
    protected $fillable =[
        'time',
        'matching',
        'description'
    ];
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
