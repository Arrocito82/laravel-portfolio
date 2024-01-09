<?php

namespace App\Models;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Chirp extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'parent_id',
    ];
    // Eventos que se disparan
    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent():BelongsTo
    {
        return $this->belongsTo(Chirp::class, 'parent_id');
    }

    public function children():HasMany
    {
        return $this->hasMany(Chirp::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }
}
