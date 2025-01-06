<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(ProjectImages::class);
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
