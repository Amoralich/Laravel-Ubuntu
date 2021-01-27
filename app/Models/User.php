<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//     protected $quarded = [
//        'password',
//    ];
     protected $fillable = [
        'name',
        'email',
        'password',
         'avatar',
    ];

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

    public function uploadAvatar($image)
    {
        $filename = $image->getClientOriginalName();
        $this->deleteOldImage();
        $image->storeAs('images', $filename, 'public');
        $this->delete(['avatar'=> $filename]);
    }

//    public function setPasswordAttribute($value)
//    {
//        $this->attributes["password"] = bcrypt($value);
//    }
//
//    public function getNameAttribute($value)
//    {
//        return ucfirst($value);
//    }
}
