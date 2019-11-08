<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'numero',
        'temporada',
        'assistido',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
