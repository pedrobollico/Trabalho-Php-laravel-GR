@extends('adminlte::default')

@section('contentheader_title')
Editando Classificação Etaria
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Editando Classificação Etaria: {{$classificacao->idade}} - {{$classificacao->descricao}}</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>["classificacoes.update", $classificacao->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('idade', 'Idade:') !!}
            {!! Form::text('idade', $classificacao->idade, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', $classificacao->descricao, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Classificacao', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
