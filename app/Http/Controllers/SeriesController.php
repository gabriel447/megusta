<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = DB::select('SELECT nome FROM series');
        return view('series.index', compact('series'));
    }

    public function create(Request $request)
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        return redirect('/series');
    }
}