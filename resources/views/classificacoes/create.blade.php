@extends('adminlte::default')

@section('contentheader_title')
Cadastro de Classificacao Etaria
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Nova Classificação</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'classificacoes.store']) !!}

        <div class="form-group">
            {!! Form::label('idade', 'Idade:') !!}
            {!! Form::text('idade', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descricao:') !!}
            {!! Form::text('descricao', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Cadastrar Classificacão Etaria', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
