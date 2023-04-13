<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;
    protected $table="child_categories";
    protected $primaryKey="id";
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory() {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function product() {
        return $this->hasMany('App\Models\Product');
    }

}
