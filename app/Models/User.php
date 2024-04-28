<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'usuario',
        'email',
        'password',
        'helperpass',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        $user = Auth::user();
        if ($user->hasRole('ADMIN')) {
            echo "Administrador";
        }
        else if ($user->hasRole('COOESTATAL')) {
            echo "Coordinador Estatal";
        }
        else if ($user->hasRole('COOMUNICIPAL')) {
            echo "Coordinador Municipal";
        }
        else if ($user->hasRole('COOGRUPO')) {
            echo "Coordinador De Grupo";
        }
        else if ($user->hasRole('RESPONSABLERED')) {
            echo "Coordinador De Redes";
        }
        else if ($user->hasRole('SIMPATIZANTES')) {
            echo "Simpatizante";
        }
        else{
            echo "Sin Rol";
        }
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }

    public function userDetails(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    public function coordinador(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'coordinador_id');
    }
    
}
