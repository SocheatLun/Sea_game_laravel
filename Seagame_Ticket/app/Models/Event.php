<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    protected function stadium():HasOne{
        return $this->hasOne(Stadium::class);
    }
    protected function event_detailid():HasOne{
        return $this->hasOne(EventDetail::class);
    }
    protected function tickets():BelongsToMany{
        return $this->belongsToMany(Ticket::class);
    }
}
