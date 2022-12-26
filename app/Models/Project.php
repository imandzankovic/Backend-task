<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function mytask(){
        return $this->hasMany('App\Models\Task','id','task_id');
    }
}
