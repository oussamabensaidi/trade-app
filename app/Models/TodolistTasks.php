<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodolistTasks extends Model
{
    use HasFactory;
    protected $table = 'todolist_task';

    protected $fillable = ['todolist_id', 'task_id'];
}
