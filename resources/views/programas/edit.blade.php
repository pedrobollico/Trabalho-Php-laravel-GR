@extends('adminlte::default')

@section('contentheader_title')
Editando Programa
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Editando Programa</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>["programas.update", $programa->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('evento_id', 'Tipo Evento') !!}
            {{ Form::select('evento_id', \App\TipoEvento::orderBy('nome')->pluck('nome', 'id')->toArray(), $programa->evento_id, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {!! Form::label('classificacao_id', 'Classificacão Etaria') !!}
            {{ Form::select('classificacao_id', \App\Classificacao::orderBy('idade')->pluck('idade', 'id')->toArray(), $programa->classificacao_id, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('nome', 'Nome: ') !!}
            {!! Form::text('nome', $programa->nome, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descricão: ') !!}
            {!! Form::text('descricao', $programa->descricao, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dia_hora', 'Dia e Hora: ') !!}
            {!! Form::text('dia_hora', $programa->dia_hora, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Programa', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <hr>


    <div class="input_fields_wrap"></div>
    <br>
    <br><button style="float:right;" class="add_field_button btn btn-success">Adicionar radialista</button>
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
            var wrapper1        = $(".input_fields_wrap");
            var wrapper        = $(".input_fields_wrap");  //Fields Wrapper
            var add_button     = $(".add_field_button"); //Add Button ID

            var x = 0; //init lal text box count
            $(add_button).click(function(e){ //on add input button click
                x++; //text box increment
                var newField1 = '<div class="input_fields_wrap"><div style="width: 40%; float:left" id="radialista"><table class="table table-striped table-bordered table-hover"><thead><tr><th>Radialista</th></tr></thead><tbody @foreach($programa->programa_radialistas as $rad)><tr><td>{{ $rad->radialista->nome }}</td><td><a href="{{ route('programas.destroyRad', ['idRad'=>$rad->radialista->id, 'id'=>$programa->id]) }}" class="btn-sm btn-danger">Remover</a></td></tr></tbody @endforeach></table></div></div>'
                var newField = '<br><div class="container-fluid"><div style="width: 70%; float:left" id="habito">{!! Form::select("itens[]", \App\Radialista::orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um radialista"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';

                $(wrapper1).append(newField1);
                $(wrapper).append(newField);
            });
            $(wrapper1).on("click",".remove_field", function(e){  //user click on remove text
                e.preventDefault(); $(this).parent('li').remove(); x--;
            });

            $(wrapper).on("click",".remove_field", function(e){  //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            });
        });

</script>
@endsection
