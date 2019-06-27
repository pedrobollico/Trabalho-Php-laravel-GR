@extends('adminlte::default')

@section('contentheader_title')
Eventos
@endsection

@section('content')
    <div class="container-fluid ">
        {!! Form::open(['name'=>'form_name', 'route'=>'eventos']) !!}
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
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->nome }}</td>
                        <td>{{ $event->descricao }}</td>
                        <td>
                            <a href="{{ route('eventos.edit', ['id'=>$event->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onclick="return ConfirmaExclusao({{$event->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $eventos->links() }}
        <br>
        <a href="{{ route('eventos.create') }}" class="btn-sm btn-info">Novo</a>
    </div>
@endsection

@section('table-delete')
"eventos"
@endsection
