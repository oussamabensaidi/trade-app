<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'win_percentage',
        'lose_percentage',
        'favorite_indicator',
        'study_objective',
    ];
    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
    public function quicktrades()
    {
        return $this->hasMany(QuickPosition::class);
    }
}
