<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class); //le decimos q una tarea pertenece a un user
    }
}