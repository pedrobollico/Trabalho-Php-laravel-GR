<?php

namespace App\Http\Controllers;

use App\TipoEvento;
use Illuminate\Http\Request;
use App\Http\Requests\TipoEventoRequest;

class TipoEventoController extends Controller
{
  public function index(Request $filtro) {
      $filtragem = $filtro->get('filtragem');

      if($filtragem == null){
          $eventos = TipoEvento::orderBy('nome')->paginate(5);
      }else{
        $eventos = TipoEvento::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(5);
      }

      return view('eventos.index', ['eventos'=>$eventos]);
  }

  public function create() {
      return view('eventos.create');
  }

  public function store(TipoEventoRequest $request) {
    $novo_evento = $request->all();
    TipoEvento::create($novo_evento);

      return redirect()->route('eventos');
  }

  public function destroy($id) {

      try{
        TipoEvento::find($id)->delete();
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
      $evento = TipoEvento::find($id);
      return view('eventos.edit', compact('evento'));
  }

  public function update(TipoEventoRequest $request, $id) {
      TipoEvento::find($id)->update($request->all());
      return redirect()->route('eventos');
  }
}
