@extends('adminlte::default')

@section('contentheader_title')
Classificacão Etaria
@endsection

@section('content')
    <div class="container-fluid ">

        {!! Form::open(['name'=>'form_name', 'route'=>'classificacoes']) !!}
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
                    <th>ID</th>
                    <th>Idade</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classificacoes as $clas)
                    <tr>
                        <td>{{ $clas->id }}</td>
                        <td>{{ $clas->idade }}</td>
                        <td>{{ $clas->descricao }}</td>
                        <td>
                            <a href="{{ route('classificacoes.edit', ['id'=>$clas->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onclick="return ConfirmaExclusao({{$clas->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $classificacoes->links() }}
        <br>
        <a href="{{ route('classificacoes.create') }}" class="btn-sm btn-info">Novo</a>
    </div>
@endsection

@section('table-delete')
"classificacoes"
@endsection
