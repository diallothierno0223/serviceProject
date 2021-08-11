<?php

namespace App\Models;

use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function user_postuler(){
        return $this->belongsToMany(User::class, "postuler_demandes");
    }
}
