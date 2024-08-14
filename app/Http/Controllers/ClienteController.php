<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Client::all();
        $cliente = null;

        if ($request->has('edit')) {
            $cliente = Client::find($request->input('edit'));
        }

        return view('welcome', compact('clientes', 'cliente'));  
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cep' => 'required|string|max:10',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        $clientId = $request->input('id');

        
        Client::updateOrCreate(
            ['id' => $clientId],
            $request->except('_token') 
        );

        return redirect()->route('welcome')  
                         ->with('teste', 'Cliente salvo com sucesso!');
    }

    public function buscarEnderecoPorCep($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        return response()->json($response->json());
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            return redirect()->route('welcome')
                             ->with('teste', 'Cliente excluído com sucesso!');
        }

        return redirect()->route('welcome')
                         ->with('erro', 'Cliente não encontrado!');
    }
}
