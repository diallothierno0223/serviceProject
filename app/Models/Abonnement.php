<?php

namespace App\Models;
use App\Models\User
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
