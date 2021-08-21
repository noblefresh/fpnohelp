<?php

namespace App\Models;

use App\Models\botmessage;
use App\Models\department;
use App\Models\user_access;
use App\Models\profilepicture;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function department()
    {
        return $this->belongsTo(department::class, 'deptid');
    }

    public function QuestionAccess()
    {
        return $this->hasMany(user_access::class, 'userid');
    }

    public function botmessages()
    {
        return $this->hasMany(botmessage::class, 'user_id');
    }

    public function profilepicture(){
        return $this->hasOne(profilepicture::class, 'userid');
    }
}
