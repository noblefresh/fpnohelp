<?php

namespace App\Models;

use App\Models\User;
use App\Models\lecturer;
use App\Models\pastquestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class department extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function pastquestion()
    {
        return $this->hasMany(pastquestion::class, 'id');
    }

    public function lecturer()
    {
        return $this->hasMany(lecturer::class, 'id');
    }
}
