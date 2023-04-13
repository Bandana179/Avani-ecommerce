<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $primaryKey="id";
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory() {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function childcategory() {
        return $this->belongsTo('App\Models\ChildCategory');
    }

}
