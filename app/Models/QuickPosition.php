<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickPosition extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_id', 
        'asset_id',
        'operation',
        'why_before',
        'why_after',
        'price',
        'target',
        'livenotes',
        'profit',
        'result',
    ];
    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
