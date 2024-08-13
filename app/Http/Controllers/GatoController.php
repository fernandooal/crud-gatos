<?php

namespace App\Http\Controllers;

use App\Models\Gato;
use App\Models\User;
use Illuminate\Http\Request;

class GatoController extends Controller
{
    public function index(){
        return view('index', [
            'gatos' => Gato::paginate(4),
            'tipoFiltro' => null,
            'pesquisa' => null,
        ]);
    }

    public function indexSearch(Request $request)
    {
        $pesquisa = $request->input('filterName');
        $tipoFiltro = $request->input('filter', 'available');

        $query = Gato::query();

        if (!empty($pesquisa)) {
            $query->where('nome', 'LIKE', '%'.$pesquisa.'%')
                ->orWhereHas('user', function ($query) use ($pesquisa) {
                    $query->where('name', 'LIKE', '%'.$pesquisa.'%');
                })
                ->with('user');
        }

        if ($tipoFiltro == 'trashed') {
            $query->onlyTrashed();
        } elseif ($tipoFiltro == 'all') {
            $query->withTrashed();
        }

        $gatos = $query->paginate(4);

        $gatos->appends(['filterName' => $pesquisa, 'filter' => $tipoFiltro]);

        return view('index', [
            'gatos' => $gatos,
            'tipoFiltro' => $tipoFiltro,
            'pesquisa' => $pesquisa,
        ]);
    }


    public function store(Request $request)
    {
        $gato = new Gato();
        $gato->nome     = $request->input('nome');
        $gato->idade    = $request->input('idade');
        $gato->raca     = $request->input('raca');
        $gato->peso     = $request->input('peso');
        $gato->sexo     = $request->input('sexo');
        $gato->user_id  = $request->input('user_id');
        $gato->save();

        return redirect()->route('gatos.index');
    }

    public function update(Request $request, $id)
    {
        $gato = Gato::findOrFail($id);
        $gato->nome     = $request->input('nome');
        $gato->idade    = $request->input('idade');
        $gato->raca     = $request->input('raca');
        $gato->peso     = $request->input('peso');
        $gato->sexo     = $request->input('sexo');
        $gato->user_id  = $request->input('user_id');
        $gato->save();
        return redirect()->route('gatos.index');
    }
    public function destroy(Request $request, $id){
        $gato = Gato::findOrFail($id);
        $gato->delete();
        return redirect()->route('gatos.index');
    }

    public function gatoIndividual($id){
        $gato = Gato::find($id);
        $donos = User::all();
        return view('cat', ['gato' => $gato, 'donos' => $donos]);
    }

    public function new(){
        $donos = User::all();
        return view('new', ['donos' => $donos]);
    }
}
