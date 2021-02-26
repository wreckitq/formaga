<?php

namespace Domain\Tenant\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($tenant) {
            $tenant->slug = \Illuminate\Support\Str::slug($tenant->name);
        });
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
