<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "UserManager";
    protected $primaryKey = "UserID";
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['UserID', 'UserName', 'Designation', 'Email', 'MobileNo', 'TerritoryID', 'Password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];

    public function Subordinates()
    {
        return $this->belongsToMany(User::class, 'SubordinateMaps', 'SupervisorID', 'SubordinateID');
    }
}
