<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'zone_id',
    ];
    public function zone()
    {
        return $this->hasOne(Zone::class);
    }
    public function event():HasMany
    {
        return $this->hasMany(Event::class);
    }
}
