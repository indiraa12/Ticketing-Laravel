<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penumpang()
    {
        return $this->belongsTo(User::class, 'penumpang_id');
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class, 'rute_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
