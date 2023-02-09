<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryYearMapping extends Model
{
    use HasFactory;
    public function year(){
        return $this->belongsTo(BoundYear::class, 'bound_year_id', 'id');
    }
}
