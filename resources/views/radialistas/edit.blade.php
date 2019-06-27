@extends('adminlte::default')

@section('contentheader_title')
Editando cadastro de Radialista
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Editando Radialista: {{$radialista->nome}}</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>["radialistas.update", $radialista->id], 'files' => true, 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $radialista->nome, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sobrenome', 'Sobrenome:') !!}
            {!! Form::text('sobrenome', $radialista->sobrenome, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
              {!! Form::label('data_nascimeto', 'Data de Nascimento: ') !!}
              {!! Form::date('data_nascimeto', $radialista->data_nascimeto, ['class'=>'form-control']) !!}
          </div>

        <div class="form-group">
            {!! Form::label('sexo', 'Sexo:') !!}
            {!! Form::select('sexo',
                             array('M'=>'Masculino', 'F'=>'Feminino'),
                             'F', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', $radialista->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::number('telefone', $radialista->telefone, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('foto', 'Foto Atual:') !!}<br>{{url("storage/public/10.jpg")}}
            <img style="max-width:250px; max-height:250px; width: auto; height; auto;" src="{{Storage::url('app/public/10.jpg')}}" />;

        </div>
        <div class="form-group">
            {!! Form::label('foto', 'Alterar foto:') !!}
            <input id = "foto" type="file" name="foto" class="btn btn-default"/>
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Radialista', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
