<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AulaController extends Controller
{

    public function exibeCadastro()
    {
        // session_start();
        // if ($this->isUserLoggedIn()) {
            return view('/aula/cadastro');
        // } else {
        //     $this->view('login_view');
        //     exit;
        // }
    }

    public function listarAulas()
    {

        return view('/aula/lista',['aulas' => Aula::all()]);


    }

    public function buscarAula($id)
    {
        Carbon::setLocale('pt');

        return view('/aula/editar', ['aula' => Aula::find($id)]);
        
    }

    
    public function enviaFormCadastro(Request $request)
    {
        $request->validate([
            'nome_aula' => 'required',
            'instrutor_responsavel' => 'required',
            'dia_semana' => 'required'
        ]);

        $aula = new Aula();
        $aula->nome_aula =  $request->input('nome_aula');
        $aula->instrutor_responsavel = $request->input('instrutor_responsavel');
        $aula->dia_semana =  $request->input('dia_semana');

        $aula->save();

        return redirect('/lista-aula');
    }

    public function enviaFormEdicao(Request $request, $id)
{
    $request->validate([
        'nome_aula' => 'required',
        'instrutor_responsavel' => 'required',
        'dia_semana' => 'required'
    ]);

    $aula = Aula::find($id);
    $aula->nome_aula = $request->input('nome_aula');
    $aula->instrutor_responsavel = $request->input('instrutor_responsavel');
    $aula->dia_semana = $request->input('dia_semana');

    $aula->save();

    return redirect('/lista-aula');
}
public function excluirAula($id)
{
    $aula = Aula::find($id);
    
    if (!$aula) {
        return redirect('/lista-aula')->with('success', 'Aula Não encontrada.');
    }
    
    $aula->delete();
    
    return redirect('/lista-aula')->with('success', 'Aula excluída com sucesso.');
}

}
