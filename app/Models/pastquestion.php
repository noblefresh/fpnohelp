<?php

namespace App\Models;

use App\Models\department;
// use App\Models\pastquestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pastquestion extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(department::class, 'deptid');
    }
}
