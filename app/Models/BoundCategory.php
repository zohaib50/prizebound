<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoundCategory extends Model
{
    use HasFactory;
    public function years(){
        return $this->belongsToMany(BoundYear::class, 'category_year_mappings', 'bound_category_id', 'bound_year_id', );
    }
}

