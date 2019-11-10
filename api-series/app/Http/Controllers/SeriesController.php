<?php

namespace App\Http\Controllers;

use App\Serie;

class SeriesController
{

    public function __construct()
    {
        $this->classe = Serie::class;
    }
}
