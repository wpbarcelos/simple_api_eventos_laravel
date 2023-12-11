<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invite extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'phone',
        'email',
        'event_id',
        'personal_document'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
