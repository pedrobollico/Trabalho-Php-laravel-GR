@extends('adminlte::default')

@section('contentheader_title')
Editando Histórico
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Editando Histórico</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route'=>'historicos.store']) !!}

        <div class="form-group">
            {!! Form::label('habito_id', 'Hábito') !!}
            {{ Form::select('habito_id', \App\Habito::orderBy('nome')->pluck('nome', 'id')->toArray(), $historico->habito_id, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('data', 'Data: ') !!}
            {!! Form::text('data', $historico->data, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('hora', 'Hora: ') !!}
            {!! Form::text('hora', $historico->hora, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Editar Histórico', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

