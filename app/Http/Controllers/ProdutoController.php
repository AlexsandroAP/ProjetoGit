<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoUpdateSupport;

class ProdutoController extends Controller
{
    public readonly Produto $produto;

    public function __construct(){
        $this->produto = new Produto();
    }

    public function index()
    {
        $produtos = $this->produto->all();
        
        return view('cruds.produtos.listarProduto', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cruds.produtos.cadastreProduto');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Remover caracteres não numéricos do valor do preço
    $preco = str_replace(['.', ','], ['', '.'], $request->input('preco'));

    $produto = new Produto();
    $produto->nome = $request->input('nome');
    $produto->quantidade = $request->input('quantidade');
    $produto->preco = $preco; // Salva o valor numérico sem formatação
    $produto->categoria = $request->input('categoria');

    if ($produto->save()) {
        return redirect()->route('produtos.index')->with('mensagemCriar', 'Produto criado');
    } else {
        return redirect()->route('produtos.create')->with('mensagemCriar', 'Não foi possível criar produto');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('cruds.produtos.excluirProduto', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('cruds.produtos.editarProduto', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoUpdateSupport $request, string $id)
{
    // Remover caracteres não numéricos do valor do preço
    $preco = str_replace(['.', ','], ['', '.'], $request->input('preco'));

    $updated = $this->produto->where('id', $id)->update([
        'nome' => $request->input('nome'),
        'quantidade' => $request->input('quantidade'),
        'preco' => $preco,
        'categoria' => $request->input('categoria'),
    ]);

    if ($updated) {
        return redirect()->route('produtos.index')->with('mensagemEditar', 'Produto editado');
    } else {
        return redirect()->route('produtos.index')->with('mensagemEditar', 'Não foi possível editar produto');
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->produto->where('id',$id)->delete();
        return redirect()->route('produtos.index')->with('mensagemDeletar','Produto excluído');;
    }
}
