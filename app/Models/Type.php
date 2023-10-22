<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $appends = ['full_name'];
    protected $fillable = [
        'nama_type',
        'keterangan'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->nama_type} - {$this->keterangan}";
    }

    public function transportation()
    {
        return $this->hasOne(Transportation::class, 'type_id');
    }
}
