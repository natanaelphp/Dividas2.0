@extends('template.template')

@section('beforeCenter')
	<a href="{{url('/')}}">Voltar</a>
	<a href="{{ url('logout') }}" class="pull-right">Logout</a>
@stop

@section('content')

	<h1>Alterar Senha</h1>

	<form action="{{ url('changePassword') }}" method="post" class="form">

		@if ( count($errors) > 0 )
			<div class="error">
				{{ $errors->first() }}
			</div>
		@endif

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<label for="password">Senha atual:</label>
		<input type="password" name="password">

		<label for="new_password">Nova senha:</label>
		<input type="password" name="new_password">

        <label for="new_password_confirmation">Digite novamente a nova senha:</label>
		<input type="password" name="new_password_confirmation">

		<input type="submit" value="Alterar">

	</form>

@stop
