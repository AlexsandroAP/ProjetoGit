<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public readonly Funcionario $funcionario;

    public function __construct(){
        $this->funcionario = new Funcionario();
    }

    public function index()
    {
        $funcionarios = $this->funcionario->all();
        return view('cruds.funcionarios.listarFuncionarios', ['funcionarios' => $funcionarios]);
    }

    public function create()
    {
        return view('cruds.funcionarios.cadastreFuncionario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'cpf' => 'required',
        ]);

        $created = $this->funcionario->create([
            'nome'=> $request->input('nome'),
            'cargo'=> $request->input('cargo'),
            'cpf'=> $request->input('cpf'),
        ]);

        if ($created) {
            return redirect()->route('funcionarios.index')->with('mensagemCriarFuncionario','Funcionario(a) inserido(a)');
        }
        return redirect()->route('funcionarios.index')->with('mensagemCriarFuncionario','Não foi possível criar funcionario(a)');
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        return view('cruds.funcionarios.excluirFuncionario', ['funcionario' => $funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('cruds.funcionarios.editarFuncionario', ['funcionario' => $funcionario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $updated = $this->funcionario->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('funcionarios.index')->with('mensagemEditarFuncionario','Funcionario(a) editado(a)');
        }

        return redirect()->route('funcionarios.index')->with('mensagemEditarFuncionario','Não foi possível editar funcionario(a)');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->funcionario->where('id',$id)->delete();
        return redirect()->route('funcionarios.index')->with('mensagemDeletarFuncionario','Funcionario(a) excluído(a)');
    }
}
