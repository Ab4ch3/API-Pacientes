<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     public function users()
    {
        # relacion con la tabla role
        return $this->belongsToMany(user::class);
    }
}
