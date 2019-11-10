<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'nome',
    ];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function setNomeAttribute(string $nome): void
    {
        $this->attributes['nome'] = mb_convert_case($nome, MB_CASE_TITLE);
    }
}
