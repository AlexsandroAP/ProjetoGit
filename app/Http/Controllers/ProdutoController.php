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
        return $produtos;
        // return view('listarProduto', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
