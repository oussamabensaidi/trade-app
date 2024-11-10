<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $table = 'to_do_lists';
    use HasFactory;
    protected $fillable = ['date', 'resault'];

    public function tasks()
    {
        return $this->belongsToMany(Tasks::class, 'todolist_task');
    }
}
