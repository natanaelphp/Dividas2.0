@extends('template.template')

@section('beforeCenter')
	<a href="{{url('/')}}">Voltar</a>
	<a href="{{ url('logout') }}" class="pull-right">Logout</a>
@stop

@section('content')

	<h1>Pagamento de {{ $user->name }}</h1>
	<img src="{{ asset('images/' . $user->image) }}" class='profile-mini'>

	<form action="{{ url('transactions') }}" method="post" class="form">

		@if ( count($errors) > 0 )
			<div class="error">
				{{ $errors->first() }}
			</div>
		@endif

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<label for="value">Valor:</label>
		<input type="text" name="value" value="{{ old('value') }}">

		<label for="description">Descrição:</label>
		<input type="text" name="description" value="{{ old('description') }}">

		<input type="hidden" name="paid_by" value="{{ $user->id }}">
		<input type="hidden" name="created_by" value="{{ $authUser->id }}">
		<input type="hidden" name="status_id" value="1">

		<input type="submit" value="Inserir">

	</form>

@stop
