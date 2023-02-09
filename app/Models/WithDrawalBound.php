<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDrawalBound extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(BoundCategory::class, 'bound_category_id', 'id');
    }
    public function year(){
        return $this->belongsTo(BoundYear::class, 'bound_year_id', 'id');
    }
}
