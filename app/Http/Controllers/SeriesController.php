<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }
    
    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso!");

        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();

        $request->session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!");

        return to_route('series.index');
    }
}