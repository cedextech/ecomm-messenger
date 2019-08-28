<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope);
    }
}
