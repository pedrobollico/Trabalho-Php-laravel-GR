<?php

namespace App\Http\Controllers;

use App\Classificacao;
use Illuminate\Http\Request;
use App\Http\Requests\ClassificacaoRequest;


class ClassificacaoEtariaController extends Controller
{
  public function index(Request $filtro) {

      $filtragem = $filtro->get('filtragem');

      if($filtragem == null){
          $classificacoes = Classificacao::orderBy('idade')->paginate(5);
      }else{
        $classificacoes = Classificacao::where('idade', 'like', '%'.$filtragem.'%')->orderBy("idade")->paginate(5);
      }

      return view('classificacoes.index', ['classificacoes'=>$classificacoes]);
  }

  public function create() {
      return view('classificacoes.create');
  }

  public function store(ClassificacaoRequest $request) {
    $novo_classificacao = $request->all();
    Classificacao::create($novo_classificacao);

      return redirect()->route('classificacoes');
  }

  public function destroy($id) {

      try{
        Classificacao::find($id)->delete();
        $ret = array('status'=>'ok', 'msg'=>"null");
      }catch (\Illuminate\Database\QueryException $e){
        $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
      }
      catch (\PDOException $e) {
        $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
      }
      return $ret;
  }

  public function edit($id) {
      $classificacao = Classificacao::find($id);
      return view('classificacoes.edit', compact('classificacao'));
  }

  public function update(ClassificacaoRequest $request, $id) {
      Classificacao::find($id)->update($request->all());
      return redirect()->route('classificacoes');
  }


}
