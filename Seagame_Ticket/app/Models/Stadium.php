<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'zone_id',
    ];
    protected function zone():HasMany{
        return $this->hasMany(Zone::class);
    }
    protected function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}
