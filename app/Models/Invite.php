<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Invite extends Model
{   
    use Notifiable;

    protected $fillable = [
        'email', 'token',
    ];

    /**
     * Scope a query to apply token.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  string $token
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeToken($query, $token)
    {
        return $query->where('token', $token);
    }
}
