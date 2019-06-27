@extends('adminlte::default')

@section('content')
<div class="container-fluid">
    <h3>Novo Programa</h3>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> 'programas.masterdetail']) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome: ') !!}
        {!! Form::text('nome', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('descricao', 'Descricão: ') !!}
        {!! Form::text('descricao', null, ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('evento_id', 'Tipo Evento') !!}
        {{ Form::select('evento_id', \App\TipoEvento::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {!! Form::label('classificacao_id', 'Classificacão Etaria') !!}
        {{ Form::select('classificacao_id', \App\Classificacao::orderBy('idade')->pluck('idade', 'id')->toArray(), null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {!! Form::label('dia_hora', 'Dia e Hora: ') !!}
        {!! Form::text('dia_hora', null, ['class'=>'form-control']) !!}
    </div>


    <hr>

    <h4>Radialistas</h4>
    <div class="input_fields_wrap"></div>
    <br>

    <button style="float:right;" class="add_field_button btn btn-success">Adicionar radialista</button>
    <br>
    <hr/>

    <div class="form-group">
         {!! Form::submit('Criar Programa', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::Close() !!}

</div>
@endsection

@section('dyn_scripts')

<script>
        $(document).ready(function() {
            var wrapper        = $(".input_fields_wrap");  //Fields Wrapper
            var add_button     = $(".add_field_button"); //Add Button ID

            var x = 0; //init lal text box count
            $(add_button).click(function(e){ //on add input button click
                x++; //text box increment
                var newField = '<div><div style="width: 94%; float:left" id="habito">{!! Form::select("itens[]", \App\Radialista::orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um radialista"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';

                $(wrapper).append(newField);
            });

            $(wrapper).on("click",".remove_field", function(e){  //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            });
        });

</script>
@endsection
