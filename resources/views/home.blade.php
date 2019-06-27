@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bem vindo ao GR</div>

					<div class="panel-body">
						Sisteama gerenciador de Radios
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
