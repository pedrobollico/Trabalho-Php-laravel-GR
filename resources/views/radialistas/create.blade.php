@extends('adminlte::default')

@section('contentheader_title')
Cadastro de Radialista
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Novo Radialista</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'radialistas.store', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sobrenome', 'Sobrenome:') !!}
            {!! Form::text('sobrenome', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
              {!! Form::label('data_nascimeto', 'Data de Nascimento: ') !!}
              {!! Form::date('data_nascimeto', null, ['class'=>'form-control']) !!}
          </div>

        <div class="form-group">
            {!! Form::label('sexo', 'Sexo:') !!}
            {!! Form::select('sexo',
                             array('M'=>'Masculino', 'F'=>'Feminino'),
                             'F', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::number('telefone', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('foto', 'Foto:') !!}
            <input id = "foto" type="file" name="foto" class="btn btn-default"/>
        </div>

        <div class="form-group">
            {!! Form::submit('Cadastrar Radialista', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
