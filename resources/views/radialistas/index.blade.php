@extends('adminlte::default')

@section('contentheader_title')
Radialistas
@endsection

@section('content')
    <div class="container-fluid ">

        {!! Form::open(['name'=>'form_name', 'route'=>'radialistas']) !!}
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
                    <th>Sobrenome</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($radialistas as $rad)
                    <tr>
                        <td>{{ $rad->id }}</td>
                        <td>{{ $rad->nome }}</td>
                        <td>{{ $rad->sobrenome }}</td>
                        <td>{{ $rad->data_nascimeto }}</td>

                        @if($rad->sexo == 'F')
                            <td>Feminino</td>
                        @elseif($rad->sexo == 'M')
                            <td>Masculino</td>
                        @endif
                        <td>{{ $rad->email }}</td>
                        <td>{{ $rad->telefone }}</td>
                        <td>
                            <a href="{{ route('radialistas.edit', ['id'=>$rad->id]) }}" class="btn-sm btn-success">Editar</a>
                            <a href="#" onclick="return ConfirmaExclusao({{$rad->id}})" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $radialistas->links() }}
        <br>
        <a href="{{ route('radialistas.create') }}" class="btn-sm btn-info">Novo</a>
    </div>
@endsection

@section('table-delete')
"radialistas"
@endsection
