<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table="sub_categories";
    protected $primaryKey="id";
    public function childcategory() {
        return $this->hasMany('App\Models\ChildCategory');
    }
    public function product() {
        return $this->hasMany('App\Models\Product');
    }

}
