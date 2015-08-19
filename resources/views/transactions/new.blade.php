@extends('template.template')

<a href="{{url('/')}}">Voltar</a>

@section('content')

	<h1>Pagamento de {{ $user->name }}</h1>
	<img src="{{ asset('images/' . $user->name . '.jpg') }}" class='profile-mini'>

	
	<form action="{{ url('transactions/add/'.$user->id) }}" method="post" class="form-transaction">

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

		<input type="submit" value="Inserir">

	</form>

@stop