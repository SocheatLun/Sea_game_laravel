<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'type',
        'stadium_id',
        'event_detail_id',
    ];
    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }
    public function eventDetails():HasMany
    {
        return $this->hasMany(EventDetail::class);
    }
    protected function tickets():HasMany{
        return $this->hasMany(Ticket::class);
    }
}
