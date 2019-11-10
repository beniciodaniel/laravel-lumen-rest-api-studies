<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'temporada',
        'numero',
        'assistido',
        'serie_id',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getNumeroAttribute(int $numero): string //accessor
    {
        return "#" . $numero;
    }
}
