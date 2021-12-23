<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curd extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function setNameAttribute($value)
    {
        $this->attributes['name']=ucwords($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date("d-M-Y,D", strtotime($value));
    }
}
