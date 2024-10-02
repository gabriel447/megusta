<?php

namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use DateTime;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository){}

    public function index()
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) 
    {
        $serie = $this->repository->add($request);
        $userList = User::all();
        foreach ($userList as $index => $user){
            $email = new SeriesCreated(
                $serie->nome,
                $serie->id,
                $request->seasonsQty,
                $request->episodesPerSeason,
            );
            $when = new DateTime();
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);

            // comando para executar a fila de email
            // php artisan queue:work --tries=2
        }

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }
}

