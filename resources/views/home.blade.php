@extends('template.template')

@section('beforeCenter')
	<a href="{{ url('transactions') }}">Listar Transações</a>
	<a href="{{ url('logout') }}" class="pull-right">Logout</a>
@stop

@section('content')

	<!--@parent-->

	<div class="central-box">
		<img src="images/{{$arrowDirection}}.png"><br>
		<h1>R$ {{ $value }}</h1>
	</div>

	<div class="central-box">
		<a href='transactions/add/{{$userId}}'>
			<img src="images/{{$userImage}}" class="profile">
		</a>
		<a href='transactions/add/{{$otherUserId}}'>
			<img src="images/{{$otherUserImage}}" class="profile">
		</a>
	</div>

@stop
