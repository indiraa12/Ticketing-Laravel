<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $appends = ['format_kode'];


    // public function getFormatKodeAttribute()
    // {
    //     return "RTE-" . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    // }


    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
