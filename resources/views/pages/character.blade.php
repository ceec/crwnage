@extends('layouts.layout')

@section('title')
@parent
cwrnagecrew.com
@stop

@section('content')
<div class="container">
@if ($type == 'notfound')

	<h1>Character Not Found</h1>

@else
	<h1>{{$character->character}}</h1>
	<hr>

	@if ($type == 'main')
		<h3>Alts</h3>
		@foreach($alts as $alt)
			<a href="/character/{{$alt->character}}">{{$alt->character}}</a><br>
		@endforeach

	@else
		<h3>Main</h3>
		<a href="/character/{{$main->character}}">{{$main->character}}</a>
	@endif

@endif






</div>