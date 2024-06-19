<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function gender()
    {
        return $this->belongsto(Gender::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function fullName()
    {
        return $this->name . " " . $this->last_name;
    }
    public function userRole()
    {
        if ($this->role()->first()->title === "admin"){
            return "ادمین";
        }elseif ($this->role()->first()->title === "normal_user"){
            return "کاربر عادی";
        }else{
            return $this->role()->first()->title === "admin";
        }
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        "last_name",
        'email',
        'password',
        "email_verified_at",
        "gender_id",
        "avatar",
        "role_id"
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
}
