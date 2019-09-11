<?php

namespace App;

use Carbon\Carbon;

/**
 * Converts Timestamps
 */
trait Timestamps
{
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}