<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_access extends Model
{
    use HasFactory;

    protected $table = 'user_accesses';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
