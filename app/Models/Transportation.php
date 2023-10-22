<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['format_kode'];


     public function getFormatKodeAttribute()
    {
        return "{$this->kode} - {$this->type->full_name}";
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function rute()
    {
        return $this->hasOne(Rute::class, 'transportation_id');
    }
}
