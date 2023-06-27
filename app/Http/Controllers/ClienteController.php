<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function exibeCadastro()
    {
        return view('/cliente/cadastro');

    }

    public function enviaFormCadastro(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'data_nascimento' => 'required',
            'genero' => 'required',
            'altura' => 'required',
            'peso' => 'required',
            'objetivo' => 'required',
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->telefone = $request->input('telefone');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->genero = $request->input('genero');
        $cliente->altura = $request->input('altura');
        $cliente->peso = $request->input('peso');
        $cliente->objetivo = $request->input('objetivo');

        $cliente->save();

        return redirect('/lista-cliente');
    }

    public function listarClientes()
    {

        return view('/cliente/lista',['clientes' => Cliente::all()]);


    }

    public function buscarCliente($id)
    {
        Carbon::setLocale('pt');

        return view('/cliente/editar', ['cliente' => Cliente::find($id)]);
        
    }

    
    

    public function enviaFormEdicao(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'email' => 'required',
        'telefone' => 'required',
        'data_nascimento' => 'required',
        'genero' => 'required',
        'altura' => 'required',
        'peso' => 'required',
        'objetivo' => 'required',

    ]);

    $cliente = Cliente::find($id);
    $cliente->nome = $request->input('nome');
    $cliente->email = $request->input('email');
    $cliente->telefone = $request->input('telefone');
    $cliente->data_nascimento = $request->input('data_nascimento');
    $cliente->genero = $request->input('genero');
    $cliente->altura = $request->input('altura');
    $cliente->peso = $request->input('peso');
    $cliente->objetivo = $request->input('objetivo');

    $cliente->save();

    return redirect('/lista-cliente');
}
public function excluirCliente($id)
{
    $cliente = Cliente::find($id);
    
    if (!$cliente) {
        // Aula não encontrada, redirecionar ou exibir uma mensagem de erro
    }
    
    $cliente->delete();
    
    return redirect('/lista-cliente')->with('success', 'Cliente excluído com sucesso.');
}


}
