<?php

namespace App\Models;
<<<<<<< HEAD
=======

>>>>>>> 613af7eeae01eba1f11c42117aa1b51a6da1b7f7
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
