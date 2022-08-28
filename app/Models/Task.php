<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'project_id',
        'status',
    ];
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
}
