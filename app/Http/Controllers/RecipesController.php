<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipes;


class RecipesController extends Controller
{
    public function Listing(){
        $recipes = Recipes::all();
        return $recipes;
    }
    
    public function create(Request $req){
        //upload
        $filename = $req->imagem->store('recipes');
        $path = env('APP_URL') . 'storage/' . $filename;
        // Log::info([$req->name, $req->imagem, $req->descricao, $req->texto]);
        $recipes = new Recipes;
        $recipes->name = $req->name;
        $recipes->imagem = $path;
        $recipes->descricao = $req->descricao;
        $recipes->texto = $req->texto;
        $recipes->avaliacao = 0;
        $recipes->qtdAvaliacao = 0;
        $recipes->save();

        return json_encode($recipes);
    }

    public function update(Request $req, $id){
        $recipes = Recipes::find($id);
        if($recipes){
            $qtdAvaliacao = $recipes->qtdAvaliacao + 1;
            if($recipes->avaliacao){
                $recipes->avaliacao = ($recipes->avaliacao * $recipes->qtdAvaliacao + $req->avaliacao) / $qtdAvaliacao;
            }
            else
                $recipes->avaliacao = $req->avaliacao;

            $recipes->qtdAvaliacao = $qtdAvaliacao;
            $recipes->save();
            return \response('Receita editado com sucesso', 200);
        }
        else
            return \response('Receita não existe!', 500);

    }
}
