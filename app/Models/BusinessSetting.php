<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property false|mixed|string $value
 * @property int|mixed|string $type
 */
class BusinessSetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


}
