<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','description','start_at','price'];

    protected $casts = [ 'start_at:datetime', 'price:money'];

    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class);
    }



}
