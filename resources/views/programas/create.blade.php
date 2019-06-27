@extends('adminlte::default')

@section('contentheader_title')
Novo Programa
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Novo Programa</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'programas.store']) !!}

        <div class="form-group">
            {!! Form::label('evento_id', 'Tipo Evento') !!}
            {{ Form::select('evento_id', \App\TipoEvento::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {!! Form::label('classificacao_id', 'Classificacão Etaria') !!}
            {{ Form::select('classificacao_id', \App\Classificacao::orderBy('idade')->pluck('idade', 'id')->toArray(), null, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('nome', 'Nome: ') !!}
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descricão: ') !!}
            {!! Form::text('descricao', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dia_hora', 'Dia e Hora: ') !!}
            {!! Form::text('dia_hora', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Programa', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
