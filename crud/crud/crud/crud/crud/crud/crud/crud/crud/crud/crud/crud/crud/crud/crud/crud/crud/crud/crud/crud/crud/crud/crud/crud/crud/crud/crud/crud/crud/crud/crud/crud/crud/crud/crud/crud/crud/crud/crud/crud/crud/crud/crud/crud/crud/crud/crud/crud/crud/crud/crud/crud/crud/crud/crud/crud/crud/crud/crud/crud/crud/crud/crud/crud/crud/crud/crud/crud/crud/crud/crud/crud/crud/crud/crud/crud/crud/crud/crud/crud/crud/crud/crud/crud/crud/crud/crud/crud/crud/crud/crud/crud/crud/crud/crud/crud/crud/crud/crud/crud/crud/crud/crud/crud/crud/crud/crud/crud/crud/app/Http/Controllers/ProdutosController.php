<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

        return redirect()->action([ProdutosController::class, 'create']);

    }

    public function update(Request $request,$id){

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'custo' => $request->preco * $request->quantidade,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return redirect()->action([ProdutosController::class, 'create']);
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->action([ProdutosController::class, 'create']);

    }
}
