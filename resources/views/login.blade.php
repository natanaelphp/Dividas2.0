@extends('template.template')

@section('content')

    <h1>Sistema de Dividas</h1>

    <form action="login" method="post" class="form">

        @if ( count($errors) > 0 )
			<div class="error">
				{{ $errors->first() }}
			</div>
		@endif

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<label for="value">E-mail:</label>
		<input type="text" name="email" value="{{ old('email') }}">

        <label for="value">Senha:</label>
		<input type="password" name="password" value="">

        <input type="submit" value="Login">

    </form>

@stop
