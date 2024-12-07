<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'future_beginning',
        'day_off', // This will store JSON array in the database
        'motivation',
        'deleted',
        'level',  // This will also store a JSON array in the database
    ];

    public function todolists()
    {
        return $this->belongsToMany(Todolist::class, 'todolist_task');
    }
}
