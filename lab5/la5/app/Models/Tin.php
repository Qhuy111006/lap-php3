<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    protected $table = 'tin';

    protected $primaryKey = 'idTin';

    public $timestamps = true;

    protected $fillable = [
        'TieuDe',
        'TomTat',
        'Content',
        'urlHinh',
        'Ngay',
        'idLT',
        'idTL',
        'SoLanXem',
        'TinNoiBat',
        'AnHien',
    ];

    protected function casts(): array
    {
        return [
            'Ngay' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'TinNoiBat' => 'boolean',
            'AnHien' => 'boolean',
        ];
    }
}
