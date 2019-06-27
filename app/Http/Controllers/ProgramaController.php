<?php

namespace App\Http\Controllers;

use App\Programa;
use App\ProgramaRadialistas;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramaRequest;

class ProgramaController extends Controller
{
  public function index(Request $filtro) {
        $filtragem = $filtro->get('filtragem');

        if($filtragem == null){
            $programas = Programa::orderBy('nome')->paginate(5);
        }else{
          $programas = Programa::where('nome', 'like', '%'.$filtragem.'%')->orderBy("nome")->paginate(5);
        }

        return view('programas.index', ['programas'=>$programas]);

    }

    public function create() {
        return view('programas.create');
    }

    public function store(ProgramaRequest $request) {
    	$novo_programa = $request->all();
    	Programa::create($novo_programa);

        return redirect()->route('programas');
    }

    public function destroy($id) {

        try{
          ProgramaRadialistas::where("programa_id", $id)->delete();
          Programa::find($id)->delete();
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
        $programa = Programa::find($id);
        return view('programas.edit', compact('programa'));
    }

    public function update(ProgramaRequest $request, $id) {
        Programa::find($id)->update($request->all());
        return redirect()->route('programas');
    }

    public function createmaster(){
      return view('programas.masterdetail');
  }

  public function masterdetail(Request $request){
      $programa = Programa::create([
          'nome'=> $request->get('nome'),
          'descricao'=> $request->get('descricao'),
          'dia_hora'=> $request->get('dia_hora'),
          'evento_id'=> $request->get('evento_id'),
          'classificacao_id'=> $request->get('classificacao_id')
      ]);
      $itens = $request->itens;
      foreach($itens as $key => $value){
          ProgramaRadialistas::create([
              'programa_id' => $programa->id,
              'radialista_id' => $itens[$key]
          ]);
      }

      return redirect()->route('programas');
  }

    public function removeRadialista($idRad, $id){

      ProgramaRadialistas::where("radialista_id", $id)->delete();
      $programa = Programa::find($id);
    }

    public function geraPdf(){
      $programas = Programa::all();

      $view = \View::make('programas.relatorio', ['programas' => $programas]);
      $html = $view->render();
      $pdf = \PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('programas.pdf');

      return $pdf->download('relatorio.pdf');
    }

}
