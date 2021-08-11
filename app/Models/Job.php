<?php

namespace App\Models;
use App\Models\Offre;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function offres(){
        return $this->hasMany(Offre::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}
