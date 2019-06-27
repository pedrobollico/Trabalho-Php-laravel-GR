@extends('adminlte::default')

@section('content')
    <div class="container-fluid">

        {!! Form::open(['name'=>'form_name', 'route'=>'programas']) !!}
        <div class="sidebar-form">
          <div class="input-group input-group-lg">
              <input type="text" name="filtragem" class="form-control" style="width:100% !important;" placeholder="Pesquisa...">
              <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                  </button>
              </span>
          </div>
        </div>
        <br>
        {!! Form::close() !!}

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Tipo de Evento</th>
                <th>Classificacão Etaria</th>
                <th>Nome</th>
                <th>descricao</th>
                <th>Radialistas</th>
                <th>Dia e hora do Programa</th>
            </tr>
            </thead>

            <tbody>
            @foreach($programas as $prog)
                    <tr>
                        <td>{{ $prog->evento->nome }}</td>
                        <td>{{ $prog->classificacao->idade }}</td>
                        <td>{{ $prog->nome }}</td>
                        <td>{{ $prog->descricao }}</td>
                        <td>
                           @foreach($prog->programa_radialistas as $rad)
                           <li>{{ $rad->radialista->nome }}</li>
                           @endforeach
                        </td>
                        <td>{{ $prog->dia_hora }}</td>
                        <td>
                            <a href="{{ route('programas.edit', ['id'=>$prog->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onclick="return ConfirmaExclusao({{$prog->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $programas->links() }}
        <br>
        <a href="{{ route('programas.createmaster') }}" class="btn-sm btn-info">Novo</a>
        <a href="{{ route('programas.relatorio') }}" class="btn-sm btn-info">Gerar PDF</a>
@endsection

@section('table-delete')
"programas"
@endsection
