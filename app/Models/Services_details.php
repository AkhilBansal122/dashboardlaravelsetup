<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services_details extends Model
{
    use HasFactory;
    protected $table="services";
    protected $fillable = [
        'name','services_id','image', 'description','created_at','updated_at','status'
    ];
}
