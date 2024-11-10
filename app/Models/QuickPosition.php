<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickPosition extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_id', 
        'assetName',
        'operation',
        'why_before',
        'why_after',
        'profit',
        'result',
    ];
}
