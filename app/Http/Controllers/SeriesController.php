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

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li>{$serie}</li>";
        }
        $html .= '</ul>';

        return $html;
    }
}