<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public readonly Produto $produto;

    public function __construct(){
        $this->produto = new Produto();
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('listarProduto', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastreProduto');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->produto->create([
            'nome'=> $request->input('nome'),
            'quantidade'=> $request->input('quantidade'),
            'preco'=> $request->input('preco'),
        ]);

        if ($created) {
            return redirect()->route('produtos.index')->with('mensagem','Produto criado');
        }
        return redirect()->route('produtos.index')->with('mensagem','Não foi possível criar produto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('excluirProduto', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('editarProduto', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->produto->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('produtos.index')->with('mensagem','Produto editado');
        } 
        
        return redirect()->route('produtos.index')->with('mensagem','Não foi possível editar produto');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->produto->where('id',$id)->delete();
        return redirect()->route('produtos.index')->with('mensagem','Produto excluído');;
    }
}
