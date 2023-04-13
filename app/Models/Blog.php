<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "user_name",
        "blog_title",
        "blog_image",
        "blog_description",
        "blog_status",
        "blog_date"
    ];

}
