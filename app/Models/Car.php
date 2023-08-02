<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'marca',
        'modelo',
        'type',
        'cor',
        'ano',
        'placa',
        'chassi',
        'renavam',
        'valor',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
