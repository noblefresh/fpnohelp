<?php

namespace App\Models;

use App\Models\User;
use App\Models\department;
use App\Models\pastquestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_department extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function department()
    {
        return $this->belongsTo(department::class, 'id');
    }

    
}
