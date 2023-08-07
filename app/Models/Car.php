<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [ /// o fillable é para mostrar os dados que podem ser utilizados no banco de dados
        'marca',
        'modelo',
        'type',
        'cor',
        'ano',
        'placa',
        'chassi',
        'renavam',
        'valor',
        'user_id',
        'cover',
        'state',
    ];

    protected $casts = [ /// o cast transforma um atributo em um tipo específico
        'state' => 'boolean'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

//    protected function state(): Attribute /// método para transformar o valor do campo state em booleano
//    {
//        return new Attribute(
//            get: fn ($state) => (bool) $state,
//        );
//    }
}
