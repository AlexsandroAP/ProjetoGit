<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public readonly Categoria $categoria;

    public function __construct(){
        $this->categoria = new Categoria();
    }

    public function index()
    {
        $categorias = $this->categoria->all();
        return view('listarCategoria', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('cadastreCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $created = $this->categoria->create([
            'nome'=> $request->input('nome'),
        ]);

        if ($created) {
            return redirect()->route('categoriass.index')->with('mensagemCriarCategoria','Categoria criado');
        }
        return redirect()->route('categorias.index')->with('mensagemCriarCategoria','Não foi possível criar categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('excluirCategoria', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('editarCategoria', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $updated = $this->categoria->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('categorias.index')->with('mensagemEditarCategoria','Categoria editado');
        } 
        
        return redirect()->route('categorias.index')->with('mensagemEditarCategoria','Não foi possível editar categoria');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoria->where('id',$id)->delete();
        return redirect()->route('categorias.index')->with('mensagemDeletarCategoria','Categoria excluído');
    }
}

