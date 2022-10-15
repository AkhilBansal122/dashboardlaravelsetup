<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table="blogs";
    protected $fillable = [
        'blog_title', 'blog_category_id','author_name','blog_public_date','blog_description', 'blogimage', 'status','created_at','updated_at'
    ];
}

