<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'nome',
    ];
    //muito importante para o accessor getLinks poder funcionar
    protected $appends = ['links'];
    // protected $perPage = 3;

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function setNomeAttribute(string $nome): void
    {
        $this->attributes['nome'] = mb_convert_case($nome, MB_CASE_TITLE);
    }

    public function getLinksAttribute($links): array
    {

        return [
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }
}
