<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'balance',
        'risk_percentage',
        'risk_ratio',
        'max_drawdown',
        'initial_balance',
        'leverage',
        'target',
        'exposure',
    ];
}
