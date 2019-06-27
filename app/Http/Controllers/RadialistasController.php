<?php

namespace App\Http\Controllers;

use App\Radialista;
use Illuminate\Http\Request;
use App\Http\Requests\RadialistaRequest;
use Illuminate\Support\Facades\Input;


class RadialistasController extends Controller
{
  public function index(Request $filtro) {

      $filtragem = $filtro->get('filtragem');

      if($filtragem == null){
          $radialistas = Radialista::orderBy('nome')->paginate(5);
      }else{
        $radialistas = Radialista::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(5);
      }
      return view('radialistas.index', ['radialistas'=>$radialistas]);
  }

  public function create() {
      return view('radialistas.create');
  }

  public function store(RadialistaRequest $request) {
    $input = $request->all();

    if(Input::hasfile('foto')){
      $file= Input::file('foto');
      $conteudo = file_get_contents($file);

      $radialista = new Radialista();
      $radialista->nome = $request->get('nome');
      $radialista->sobrenome = $request->get('sobrenome');
      $radialista->data_nascimeto = $request->get('data_nascimeto');
      $radialista->sexo = $request->get('sexo');
      $radialista->email = $request->get('email');
      $radialista->telefone = $request->get('telefone');
      $radialista->save();
      \Storage::disk('public')->put($radialista->id.".jpg", $conteudo);
    }
    else{
      Radialista::create($input);
    }

      return redirect()->route('radialistas');
  }

  public function destroy($id) {

      try{
        Radialista::find($id)->delete();
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
      $radialista = Radialista::find($id);
      return view('radialistas.edit', compact('radialista'));
  }

  public function update(RadialistaRequest $request, $id) {
      Radialista::find($id)->update($request->all());
      return redirect()->route('radialistas');
  }
}
