<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'rules',
        'failed_times',
        'give_up',
        'victory',
    ];
}
