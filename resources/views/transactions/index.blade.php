@extends('template/template')

@section('beforeCenter')
	<a href="{{url('/')}}">Voltar</a>
@stop

@section('content')

	<h1>Lista de Transações</h1>

	@if( count($transactions) == 0 )

		<p class="cinza">Nenhuma transação cadastrada.</p>

	@else

		<table class="tabela">
			<tr>
				<th>Descrição</th>
				<th>Valor</th>
				<th>Data/Hora</th>
				<th>Pago por</th>
				<th>Criado por</th>
			</tr>

			@foreach($transactions as $transaction)

				<tr>
					<td>{{ $transaction->description }}</td>
					<td>{{ $transaction->value }}</td>
					<td align='center'>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
					<td align='center'>
						<img src="{{ asset('images/'.$transaction->paidBy->image) }}" class="profile-table">
					</td>
					<td align='center'>
						<img src="{{ asset('images/'.$transaction->createdBy->image) }}" class="profile-table">
					</td>
				</tr>

			@endforeach

		</table>

		{!! $transactions->render() !!}

	@endif

@stop
