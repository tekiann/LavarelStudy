<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function create(){
        $produtos = Produto::all();
        return view('produtos.create',['produtos'=>$produtos]);
    }
    public function store(Request $request){

        Produto::create([
            'nome' => $request->nome,
            'custo' => $request->preco * $request->quantidade,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        $produtos = Produto::all();
        return view('produtos.create',['produtos'=>$produtos]);

    }
    public function show($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.show',['produto' =>$produto]);
    }
    public function edit($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.edit',['produto' =>$produto]);
    }
    public function update(Request $request,$id){

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'custo' => $request->preco * $request->quantidade,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return "Produto Editado com Sucesso!";
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        $produtos = Produto::all();
        return view('produtos.create',['produtos'=>$produtos]);

    }
}
