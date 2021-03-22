<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaysSingleCategory extends Model
{
    protected $fillable=['name','complete','seen','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'id');
    }
}
