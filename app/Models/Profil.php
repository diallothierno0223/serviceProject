<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class Profil extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
}
