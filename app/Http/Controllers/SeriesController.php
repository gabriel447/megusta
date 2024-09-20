<?php

namespace App\Http\Controllers;

class SeriesController
{
    public function listarSeries()
    {
        $series = [
            'breaking bad',
            'prison break',
            'how i meet your mother'
        ];

        return view('series', compact('series'));
    }
}