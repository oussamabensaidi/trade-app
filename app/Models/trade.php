<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticker_name',
        'dow_1h',
        'dow_1h_note',
        'dow_day',
        'dow_day_note',
        'dow_4h',
        'dow_4h_note',
        'moving_average_1h',
        'moving_average_1h_note',
        'moving_average_day',
        'moving_average_day_note',
        'moving_average_4h',
        'moving_average_4h_note',
        'macd_1h',
        'macd_1h_note',
        'macd_day',
        'macd_day_note',
        'macd_4h',
        'macd_4h_note',
        'rsi_1h',
        'rsi_1h_note',
        'rsi_day',
        'rsi_day_note',
        'rsi_4h',
        'rsi_4h_note',
        'fibo',
        'fibo_note',
        'gann',
        'gann_note',
        'result',
        'picture',
        'major_notes',
        'asset_type',
        'post_notes',
        'post_picture'
    ];
}
