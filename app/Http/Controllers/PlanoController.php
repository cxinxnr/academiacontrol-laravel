<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function exibeCadastro()
    {

            return view('/plano/cadastro');

    }
    public function enviaFormCadastro(Request $request)
    {
        $request->validate([
            'nome_plano' => 'required',
            'descricao' => 'required',
            'valor' => 'required',
            'beneficios' => 'required'
        ]);

        $plano = new Plano();
        $plano->nome_plano = $request->input('nome_plano');
        $plano->descricao =  $request->input('descricao');
        $plano->valor = $request->input('valor');
        $plano->beneficios = $request->input('beneficios');

        $plano->save();

        return redirect('lista-plano');
    }


    public function listarPlanos()
    {

        return view('/plano/lista',['planos' => Plano::all()]);


    }

    public function buscarPlano($id)
    {
        Carbon::setLocale('pt');

        return view('/plano/editar', ['plano' => Plano::find($id)]);
        
    }

    
    

    public function enviaFormEdicao(Request $request, $id)
{
    $request->validate([
        'nome_plano' => 'required',
        'descricao' => 'required',
        'valor' => 'required',
        'beneficios' => 'required'

    ]);

    $plano = Plano::find($id);
    $plano->nome_plano = $request->input('nome_plano');
    $plano->descricao =  $request->input('descricao');
    $plano->valor = $request->input('valor');
    $plano->beneficios = $request->input('beneficios');

    $plano->save();

    return redirect('/lista-plano');
}
public function excluirPlano($id)
{
    $plano = Plano::find($id);
    
    if (!$plano) {
        // Aula não encontrada, redirecionar ou exibir uma mensagem de erro
    }
    
    $plano->delete();
    
    return redirect('/lista-plano')->with('success', 'Plano excluído com sucesso.');
}

}
