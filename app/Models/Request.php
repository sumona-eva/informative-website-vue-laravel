<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'phone', 'email','type','business', 'request', 'location', 'message']    ;
}