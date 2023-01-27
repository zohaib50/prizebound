<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoundYear extends Model
{
    use HasFactory;
    public function categories(){
        return $this->belongsToMany(BoundYear::class, 'category_year_mappings', 'bound_year_id', 'bound_category_id', );
    }
}
