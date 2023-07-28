<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * @mixin IdeHelperTarget
 */
class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'remote_id',
        'project_id',
        'name',
        'email',
    ];

    protected $casts = [
        'properties' => 'json',
    ];

    public function getRouteKeyName(): string
    {
        return 'remote_id';
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
