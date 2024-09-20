<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = [
            'breaking bad',
            'prison break',
            'how i meet your mother'
        ];

        return view('series.index', compact('series'));
    }

    public function create(Request $request)
    {
        return view('series.create');
    }
}