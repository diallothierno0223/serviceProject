<?php

namespace App\Models;

use App\Models\Profil;
use App\Models\Offre;
use App\Models\Demande;
use App\Models\Abonnement;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function offres(){
        return $this->hasMany(Offre::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }

    public function abonnements(){
        return $this->hasMany(Abonnement::class);
    }

    public function demande_postuler(){
        return $this->belongsToMany(Demande::class, "postuler_demandes");
    }

    public function offre_postuler(){
        return $this->belongsToMany(Offre::class, "postuler_offres");
    }
}
