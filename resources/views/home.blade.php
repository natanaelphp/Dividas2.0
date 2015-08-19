@extends('template.template')

<a href="{{{ url('transactions') }}}">Listar Transações</a>

@section('content')

	<!--@parent-->

	<div class="central-box">
		<img src="images/{{$arrowDirection}}.png"><br>
		<h1>R$ {{ $value }}</h1>
	</div>

	<div class="central-box">
		<a href='transactions/add/1'>
			<img src="images/{{$userImage}}" class="profile">
		</a>
		<a href='transactions/add/2'>
			<img src="images/{{$otherUserImage}}" class="profile">
		</a>
	</div>

@stop
