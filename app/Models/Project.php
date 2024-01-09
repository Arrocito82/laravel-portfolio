<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'contribution',
        'repository',
        'preview',

    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chirps():HasMany
    {
        return $this->hasMany(Chirp::class);
    }
}
