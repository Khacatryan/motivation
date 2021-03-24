<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
    public function days()
    {
        return $this->belongsTo(DaysSingleCategory::class, 'id');
    }
}
